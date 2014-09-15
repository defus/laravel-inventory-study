<?php

/**
 * UserModel 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 9, 2014
 * 
 */
class UserModel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = array('first_name', 'last_name', 'email', 'password');
    private $_validationRules = array(
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed'
    );

    public function insert($data) {

        $validator = Validator::make($data, $this->_validationRules);
        if ($validator->fails()) {
            return $validator;
        }

        if (!empty(self::where('email', '=', $data['email']))) {

            self::create(array(
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ));

            return TRUE;
        } else {

            // Email address already existing
            $validator->getMessageBag()->add('email', 'Email already existing');
            return $validator;
        }

        // When all else fails
        return FALSE;
    }

    public function modify($data) {

        $validationRules = array_merge(array(
            'id' => 'required',
            'old_password' => 'required'
                ), $this->_validationRules
        );
        $validator = Validator::make($data, $validationRules);
        if ($validator->fails()) {
            return $validator;
        }

        // Get record info
        $record = self::find($data['id']);
        // Check if email is used
        $existing = self::where('email', '=', $data['email']);

        // Check if a diffrent email was given and check if that is existing
        if (!empty($record) && $record->email !== $data['email'] && !empty($existing)) {
            $validator->getMessageBag()->add('email', 'Email already existing');
        } else if (!empty($record) && Hash::check($data['old_password'], $record->password)) {
            foreach (array_keys($this->_validationRules) as $value) {
                $record->$value = $data[$value];
            }
            $record->save();
            return TRUE;
        } else {
            $validator->getMessageBag()->add('old_password', 'Invalid password given');
            return $validator;
        }
        return FALSE;
    }

    public function remove($data) {

        $validationRules = array_merge(array('id' => 'required'));
        $validator = Validator::make($data, $validationRules);
        if ($validator->fails()) {
            return $validator;
        }

        $record = self::find($data['id']);
        if (!empty($record)) {
            $record->delete();
            return TRUE;
        }

        return FALSE;
    }

}

<?php

/**
 * Items 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 7, 2014
 * 
 */
class ItemModel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';
    protected $fillable = array('name', 'description');

    /**
     * Validation rules when adding,updating an item
     * @var type 
     */
    private $_validationRules = array(
        'name' => 'required',
        'description' => 'required'
    );

    public function insert($data) {

        $validator = Validator::make($data, $this->_validationRules);
        if ($validator->fails()) {
            return $validator;
        }

        self::create($data);

        return TRUE;
    }

    public function modify($data) {

        $validationRules = array_merge(array('id' => 'required'), $this->_validationRules);
        $validator = Validator::make($data, $validationRules);
        if ($validator->fails()) {
            return $validator;
        }

        $record = self::find($data['id']);

        if (!empty($record)) {

            foreach (array_keys($this->_validationRules) as $value) {
                $record->$value = $data[$value];
            }
            $record->save();
            return TRUE;
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

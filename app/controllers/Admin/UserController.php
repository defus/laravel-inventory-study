<?php

/**
 * UserController 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 7, 2014
 * 
 */

namespace Admin;

class UserController extends \BaseController {

    private $_userModel;

    public function __construct() {
        $this->_userModel = new \UserModel();
    }

    public function index() {
        return \View::make('admin.user.index', array(
                    'users' => \UserModel::all()
        ));
    }

    public function add() {

        if (!empty(\Input::all())) {

            $add = $this->_userModel->insert(\Input::all());
            if (TRUE === $add) {
                return \Redirect::to('/admin/users')
                                ->with('message', 'User added');
            } else {
                return \Redirect::to(\Request::url())
                                ->withErrors($add)
                                ->withInput();
            }
        }

        return \View::make('admin.user.add', array());
    }

    public function edit($id) {

        $user = \UserModel::find($id);

        if (empty($user)) {
            return \Redirect::to('admin/users');
        } elseif (!empty(\Input::all()) && !empty($user)) {
            $update = $this->_userModel->modify(\Input::all());
            if (TRUE === $update) {
                return \Redirect::to('/admin/users')
                                ->with('message', 'User updated');
            } else {
                return \Redirect::to(\Request::url())
                                ->withErrors($update)
                                ->withInput();
            }
        }

        return \View::make('admin.user.edit', array(
                    'user' => $user
        ));
    }
    
    public function delete($id) {

        // Find by ID first
        $data = \UserModel::find($id)->toArray();

        if (!empty($data) && !empty(\Input::all())) {

            $itemModel = new \UserModel();
            $remove = $itemModel->remove(\Input::all());

            if ($remove !== TRUE) {
                return \Redirect::to("admin/users/edit/$id")
                                ->withErrors($remove)
                                ->withInput();
            }
        }

        return \Redirect::to('admin/users')
                ->with('message', 'Item deleted');
        
    }
    
}

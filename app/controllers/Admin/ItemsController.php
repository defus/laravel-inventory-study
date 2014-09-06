<?php

/**
 * ItemsController
 * 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 6, 2014
 * 
 */

namespace Admin;

class ItemsController extends \BaseController {

    public function index() {

        return \View::make('admin.items/.index', array(
                    'items' => \ItemModel::all()
        ));
    }

    public function add() {

        if (!empty(\Input::all())) {
            $itemModel = new \ItemModel();
            $insert = $itemModel->insert(\Input::all());

            if ($insert === TRUE) {
                return \Redirect::to('admin/items')
                        ->with('message', 'Item added');
            } else {
                return \Redirect::to('admin/items/add')
                                ->withErrors($insert)
                                ->withInput();
            }
        }

        return \View::make('admin.items.add');
    }

    public function edit($id) {

        // Find by ID first
        $data = \ItemModel::find($id)->toArray();

        if (empty($data)) {
            return \Redirect::to('admin/items');
        } else if (!empty($data) && !empty(\Input::all())) {

            $itemModel = new \ItemModel();
            $update = $itemModel->modify(\Input::all());

            if ($update === TRUE) {
                return \Redirect::to('admin/items')
                        ->with('message', 'Item updated');
            } else {
                return \Redirect::to("admin/items/edit/$id")
                                ->withErrors($update)
                                ->withInput();
            }
        }

        return \View::make('admin.items.edit', array(
                    'data' => $data
        ));
    }

    public function delete($id) {

        // Find by ID first
        $data = \ItemModel::find($id)->toArray();

        if (!empty($data) && !empty(\Input::all())) {

            $itemModel = new \ItemModel();
            $remove = $itemModel->remove(\Input::all());

            if ($remove !== TRUE) {
                return \Redirect::to("admin/items/edit/$id")
                                ->withErrors($remove)
                                ->withInput();
            }
        }

        return \Redirect::to('admin/items')
                ->with('message', 'Item deleted');
        
    }

}

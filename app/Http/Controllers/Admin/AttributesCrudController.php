<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AttributesRequest;
use App\Models\Groups;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Location;

/**
 * Class AttributesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AttributesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        create as traitCreate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Attributes::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/attributes');



        CRUD::setEntityNameStrings('атрибут', 'Атрибуты');

        CRUD::addFilter(
            [
                'name' => 'id',
                'type' => 'select2',
                'label' => 'Группа атрибутов',
            ],
            function () {
                return Groups::pluck('name', 'id')->toArray();
            },
            function ($value) {
                $this->crud->addClause('where', 'group_id', $value);
            }
        );
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */

        if (!Groups::exists()) {
            \Alert::add('error', 'Сперва создайте группу атрибутов')->flash();
        }

        CRUD::setValidation(AttributesRequest::class);

//        CRUD::setFromDb(); // fields

        CRUD::addField([
            'name' => 'name',
            'label' => 'Название',
            'type' => 'text',
        ]);

        CRUD::addField([
            'name' => 'type',
            'label' => 'Тип',
            'type' => 'text',
            'options' => [
                'text' => 'Текст',
                'img' => 'Картинка',
                'color' => 'Цвет'
            ],
        ]);

        CRUD::addField([
            'name' => 'slug',
            'label' => 'Символьный код',
            'type' => 'slug'
        ]);

        CRUD::addField([
            'name' => 'group_id',
            'label' => 'Группа',
            'entity' => 'group',
            'type' => 'select2',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

}

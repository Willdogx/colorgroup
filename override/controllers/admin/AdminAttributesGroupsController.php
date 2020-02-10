<?php


class AdminAttributesGroupsController extends AdminAttributesGroupsControllerCore
{
    public function renderForm()
    {
        $this->table = 'attribute_group';
        $this->identifier = 'id_attribute_group';

        $group_type = array(
            array(
                'id' => 'select',
                'name' => $this->trans('Drop-down list', array(), 'Admin.Global'),
            ),
            array(
                'id' => 'radio',
                'name' => $this->trans('Radio buttons', array(), 'Admin.Global'),
            ),
            array(
                'id' => 'color',
                'name' => $this->trans('Color or texture', array(), 'Admin.Catalog.Feature'),
            ),
            array(
                'id' => 'colorGroup',
                'name' => $this->trans('Color or texture group', array(), 'Admin.Catalog.Feature'),
            ),
        );

        $this->fields_form = array(
            'legend' => array(
                'title' => $this->trans('Attributes', array(), 'Admin.Catalog.Feature'),
                'icon' => 'icon-info-sign',
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->trans('Name', array(), 'Admin.Global'),
                    'name' => 'name',
                    'lang' => true,
                    'required' => true,
                    'col' => '4',
                    'hint' => $this->trans('Your internal name for this attribute.', array(), 'Admin.Catalog.Help') . '&nbsp;' . $this->trans('Invalid characters:', array(), 'Admin.Notifications.Info') . ' <>;=#{}',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->trans('Public name', array(), 'Admin.Catalog.Feature'),
                    'name' => 'public_name',
                    'lang' => true,
                    'required' => true,
                    'col' => '4',
                    'hint' => $this->trans('The public name for this attribute, displayed to the customers.', array(), 'Admin.Catalog.Help') . '&nbsp;' . $this->trans('Invalid characters:', array(), 'Admin.Notifications.Info') . ' <>;=#{}',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->trans('Attribute type', array(), 'Admin.Catalog.Feature'),
                    'name' => 'group_type',
                    'required' => true,
                    'options' => array(
                        'query' => $group_type,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'col' => '2',
                    'hint' => $this->trans('The way the attribute\'s values will be presented to the customers in the product\'s page.', array(), 'Admin.Catalog.Help'),
                ),
            ),
        );

        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->trans('Shop association', array(), 'Admin.Global'),
                'name' => 'checkBoxShopAsso',
            );
        }

        $this->fields_form['submit'] = array(
            'title' => $this->trans('Save', array(), 'Admin.Actions'),
        );

        if (!($obj = $this->loadObject(true))) {
            return;
        }

        return parent::renderForm();
    }
}

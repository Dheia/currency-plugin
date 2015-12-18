<?php namespace Responsiv\Currency;

use Backend;
use System\Classes\PluginBase;

/**
 * Currency Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Currency',
            'description' => 'Tools for currency display and conversion',
            'author'      => 'Responsiv Internet',
            'icon'        => 'icon-usd'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents() { }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'responsiv.currency.some_permission' => [
                'tab' => 'Currency',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'currencies' => [
                'label'       => 'Currencies',
                'description' => 'Create and configure available currencies.',
                'icon'        => 'icon-usd',
                'url'         => Backend::url('responsiv/currency/currencies'),
                'category'    => 'Currency',
                'order'       => 500,
            ],
            'converters' => [
                'label'       => 'Currency Converters',
                'description' => 'Select and manage the currency converter to use.',
                'icon'        => 'icon-calculator',
                'url'         => Backend::url('responsiv/currency/converters'),
                'category'    => 'Currency',
                'order'       => 510,
            ],
        ];
    }

    /**
     * Register new Twig variables
     * @return array
     */
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'currency' => ['Responsiv\Currency\Helpers\Currency', 'format'],
            ]
        ];
    }

    /**
     * Registers any currency converters implemented in this plugin.
     * The converters must be returned in the following format:
     * ['className1' => 'alias'],
     * ['className2' => 'anotherAlias']
     */
    public function registerPaymentGateways()
    {
        return [
            'Responsiv\Currency\ConverterTypes\EuropeanCentralBank' => 'ecb',
            'Responsiv\Currency\ConverterTypes\XeServices'          => 'xe',
            'Responsiv\Currency\ConverterTypes\Yahoo'               => 'yahoo',
        ];
    }

}
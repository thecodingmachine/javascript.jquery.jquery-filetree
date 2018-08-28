<?php


namespace Mouf\Javascript\JQueryFileTree;

use Mouf\Html\Utils\WebLibraryManager\WebLibrary;
use TheCodingMachine\Funky\Annotations\Factory;
use TheCodingMachine\Funky\Annotations\Tag;
use TheCodingMachine\Funky\ServiceProvider;

class JQueryFileTreeServiceProvider extends ServiceProvider
{
    /**
     * @Factory(name="jQueryFileTreeWebLibrary", tags={@Tag(name="webLibraries", priority=-10.0)})
     */
    public static function createWebLibrary(): WebLibrary
    {
        return new WebLibrary(array(
            'vendor/mouf/javascript.jquery.jquery-filetree/jqueryFileTree.js'
        ),
        array(
            'vendor/mouf/javascript.jquery.jquery-filetree/jqueryFileTree.css'
        ));
    }
}

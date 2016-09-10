<?php

namespace HackTheHub\Leaves\Event;

use HackTheHub\Models\Event\Category;
use HackTheHub\Models\Event\Event;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\SelectionControls\DropDown\DropDown;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Crud\Leaves\CrudView;
use Rhubarb\Leaf\Views\View;

class EventItemView extends CrudView
{
    public function createSubLeaves()
    {
        $lat = new TextBox("Latitude");
        $long = new TextBox("Longitude");
        $name = new TextBox("Name");
        $date = new TextBox("DateTime");
        $category = new DropDown("Category");
        $categories = Category::find();
        $categoriesList = [];
        foreach ($categories as $categoryName){
            $categoriesList[$categoryName->UniqueIdentifier] = $categoryName->Name;
        }
        $category->setSelectionItems($categoriesList);
        $cost = new TextBox("Cost");
        $this->registerSubLeaf($lat);
        $this->registerSubLeaf($long);
        $this->registerSubLeaf($category);
        $this->registerSubLeaf($long);
        $this->registerSubLeaf($long);

        parent::createSubLeaves(); // TODO: Change the autogenerated stub
    }
    

    protected function printViewContent()
    {
        print $this->leaves["Latitude"];
        print $this->leaves["Longitude"];
        print $this->leaves["Category"];
        print $this->leaves["Save"];
    }
}
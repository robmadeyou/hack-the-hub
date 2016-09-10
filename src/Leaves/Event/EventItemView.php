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
        $date = new TextBox("DateTimeStart");
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
        $this->registerSubLeaf($name);
        $this->registerSubLeaf($date);
        $this->registerSubLeaf($cost);

        parent::createSubLeaves(); // TODO: Change the autogenerated stub
    }
    

    protected function printViewContent()
    {
        print "<div>Location Details<div>";
        print "&nbsp&nbsp&nbsp&nbspLatitude: " . $this->leaves["Latitude"] . "<br>" ;
        print "&nbsp&nbsp&nbsp&nbspLongitude: " . $this->leaves["Longitude"];
        print "</div>";
        print "<div>Timing Details<div>";
        print "&nbsp&nbsp&nbsp&nbspWhen will your event happen?" . $this->leaves["DateTimeStart"] . "<br>";
        print "&nbsp&nbsp&nbsp&nbspAnd When will it end?" . $this->leaves["DateTimeStart"] . "<br>";
        print "</div>";
        print "<div>Pricing<div>";
        print "&nbsp&nbsp&nbsp&nbspHow much is a ticket to your event? £" . $this->leaves["Cost"] . "<br>";
        print "</div>";
        print "<div>General Info<div>";
        print "&nbsp&nbsp&nbsp&nbspWhich category best describes your event?" . $this->leaves["Category"] . "<br>";
        print "&nbsp&nbsp&nbsp&nbspWhat is the name of your event?" . $this->leaves["Name"] . "<br>";
        print "</div>";
        print $this->leaves["Save"];
        print "</div>";
    }
}
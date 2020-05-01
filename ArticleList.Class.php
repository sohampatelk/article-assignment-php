<?php
ini_set( 'display_errors', 1);
ini_set( 'display_startup_errors', 1);
error_reporting( E_ALL );
include_once dirname( __FILE__ ).'/Article.Class.php';

class ArticleList {
    //properties
    private $allArticleList = array();

    //Methods
    function __construct($jasonFilePath = '')
    {   //check if the file exists...
        if (file_exists($jasonFilePath)) {   //will retrieve the file contects as a string
            $jasonString = file_get_contents($jasonFilePath);

            //conver the JSON string to the php object.
            $jsonObject = json_decode($jasonString);

            //Check if the snacks are an array
            if (is_array($jsonObject->articles)) {   //store the array in our property
                $this->allArticleList = $jsonObject->articles;
            }
            // If snacks are NOT an array.
            else { // Show a warning in the browser.
                echo '<p>WARNING: The snacks appear to be malformed!</p>';
            }
        }
        // If file doesn't exist.
        else { // Show a warning in the browser.
            echo '<p>WARNING: Your file doesn\'t exist!</p>';
        }
    }

    // Output all of the articles.
    public function output()
    { // If there ARE articles.
        if (is_array($this->allArticleList) && !empty($this->allArticleList)) { // Heading, and open our unordered list.
            echo '<h2>Article List</h2><ul>';
            // Loop through the articles!
            foreach ($this->allArticleList as $i) { // Create an instance of our OTHER class:articles! Pass in the values.
                $newSnack = new Article($i->id, $i->title, $i->content);
                // Echo out our result.
                echo '<li>' . $newSnack->output(FALSE) . '</li>';
            } // Close the unordered list.
            echo '</ul>';
        }
    }

}

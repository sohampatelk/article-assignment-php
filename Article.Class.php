<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Article
{
    //properties with default values
    public $id = 0;
    public $title = '';
    public $content = '';

    //methods
    function __construct($id = 0, $title = '', $content = '')
    {
        if (is_integer($id) && !empty($id)) {
            $this->id = $id;
        }
        if (is_string($title) && !empty($title)) {
            $this->title = $title;
        }
        if (is_string($content) && !empty($content)) {
            $this->content = $content;
        }
    }

    public function output($echo = TRUE)
    {
        $output = '';
        ob_start(); // Begins an output buffer.
?>
        <dl>
            <!-- <dt>Id</dt> -->
            <!-- <dd><?php //echo $this->id; ?></dd> -->
            <dt>Title</dt>
            <dd><a href="/Article.Info.php"><?php echo $this->title; ?></a></dd>
            <dt>Content</dt>
            <dd><?php echo $this->content; ?></dd>
        </dl>
<?php   // ob_get_clean() clears the output buffer, and returns what the string was.
        $output = ob_get_clean(); // We now have the buffered (echo'd) string contents saved in a variable.
        if ($echo === TRUE) echo $output; // Output, if our argument tells us to.
        return $output; // Return the string.
    }
}
?>
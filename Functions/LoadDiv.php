<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 29/09/15
 * Time: 11:53
 */

/**
 * loadContent
 *
 * LoadDiv.php
 *
 * @param $where, $default [where is the id and $default is what we want inside (default = null)]
 */

session_start();

function loadSidebar($sidebar, $default){

    $sidebar = filter_var($sidebar, FILTER_SANITIZE_STRING);

    //Get content from the url
    if(isset($_GET['sidebar'])){
        $sidebar = $_GET['sidebar'];
        //Sanitize a little bit
        $sidebar = filter_var($sidebar, FILTER_SANITIZE_STRING);
    }


    $sidebar = empty($sidebar)? $default : $sidebar;

    if($sidebar) {
        //include the sidebar selected
        $html = include 'SidebarCode/'.$sidebar.'.php';
        return $html;
    }
}

function loadContent($content, $default){

    //sanitizing content
    $content = filter_var($content, FILTER_SANITIZE_STRING);

    //Get content from the url
    if(isset($_GET['content'])){
        $content = $_GET['content'];
        //sanitize a little bit
        $content = filter_var($content, FILTER_SANITIZE_STRING);
    }

    $content = empty($content)? $default : $content;

    if($content){
        //include the content selected
        $html = include 'ContentCode/'.$content.'.php';
        return $html;
    }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    private $CI;
    private $var = array();
    private $theme = 'main_layout';
    
/*
|===============================================================================
| Constructeur
|===============================================================================
*/
    
    public function __construct()
    {
        $this->CI = get_instance();
        $this->var['output'] = '';

        //  Le titre est composé du nom de la méthode et du nom du contrôleur
        //  La fonction ucfirst permet d'ajouter une majuscule
        $this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());
        
        //  Nous initialisons la variable $charset avec la même valeur que
        //  la clé de configuration initialisée dans le fichier config.php
        $this->var['charset'] = $this->CI->config->item('charset');

        $this->var['css'] = array(semantic_css_url('semantic'), css_url('style'));
        $this->var['js'] = array(jquery_url('jquery.min'), semantic_js_url('semantic'));
    }
    
    /*
    |===============================================================================
    | Méthodes pour charger les vues
    |   . view
    |   . views
    |===============================================================================
    */
    
    public function view($name, $data = array())
    {
        $this->var['output'] .= $this->CI->load->view($name, $data, true);
        
        $this->CI->load->view('../views/layout/' . $this->theme, $this->var);
    }
    
    public function views($name, $data = array())
    {
        $this->var['output'] .= $this->CI->load->view($name, $data, true);
        return $this;
    }

    public function include_public_menu()
    {
        $this->add_js('menu');
        $this->add_css('menu');
    }

    public function include_admin_menu()
    {
        $this->include_public_menu();
    }

    public function set_titre($titre)
    {
        if(is_string($titre) AND !empty($titre))
        {
            $this->var['titre'] = $titre;
            return true;
        }
        return false;
    }

    public function set_charset($charset)
    {
        if(is_string($charset) AND !empty($charset))
        {
            $this->var['charset'] = $charset;
            return true;
        }
        return false;
    }

    public function set_theme($theme)
    {
        if(is_string($theme) AND !empty($theme) AND file_exists('../views/layout/' . $theme . '.php'))
        {
            $this->theme = $theme;
            return true;
        }
        return false;
    }

    /*
    |===============================================================================
    | Méthodes pour ajouter des feuilles de CSS et de JavaScript
    |   . ajouter_css
    |   . ajouter_js
    |===============================================================================
    */
    public function add_css($nom)
    {
        if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css'))
        {
            array_push($this->var['css'], css_url($nom));
            return true;
        }
        return false;
    }

    public function add_js($nom)
    {
        if(is_string($nom) AND !empty($nom))
        {
            array_push($this->var['js'],js_url($nom));
            return true;
        }
        return false;
    }

    public function add_semantic_css_component($nom){
        if(is_string($nom) AND !empty($nom))
        {
            array_push($this->var['css'],semantic_components_url($nom . '.css'));
            return true;
        }
        //var_dump($this->var['css']);
        return false;
    }

    public function add_semantic_js_component($nom){
        if(is_string($nom) AND !empty($nom))
        {
            array_push($this->var['js'],semantic_components_url($nom . '.js'));
            return true;
        }
        //var_dump($this->var['css']);
        return false;
    }
}
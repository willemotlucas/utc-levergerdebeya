<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url'))
{
    function css_url($nom)
    {
        return base_url() . 'assets/css/' . $nom . '.css';
    }
}

if ( ! function_exists('js_url'))
{
    function js_url($nom)
    {
        return base_url() . 'assets/js/' . $nom . '.js';
    }
}

if ( ! function_exists('img_url'))
{
    function img_url($nom)
    {
        return base_url() . 'assets/images/' . $nom;
    }
}

if ( ! function_exists('img'))
{
    function img($nom, $alt = '')
    {
        return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
    }
}

if ( ! function_exists('vendors_url'))
{
    function vendors_url($nom)
    {
        return base_url() . 'assets/vendors/' . $nom . '/';
    }
}

if ( ! function_exists('semantic_js_url'))
{
    function semantic_js_url($nom = '')
    {
        return vendors_url("semantic") . $nom . '.js';
    }
}

if ( ! function_exists('semantic_css_url'))
{
    function semantic_css_url($nom = '')
    {
        return vendors_url("semantic") . $nom . '.css';
    }
}

if ( ! function_exists('semantic_components_url'))
{
    function semantic_components_url($nom)
    {
        return vendors_url("semantic") . "components/" . $nom;
    }
}

if ( ! function_exists('jquery_url'))
{
    function jquery_url($nom)
    {
        return vendors_url("jquery") . $nom . ".js";
    }
}
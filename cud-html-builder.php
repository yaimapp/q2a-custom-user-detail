<?php

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

class cud_html_builder
{
    
    public static function create_buttons($userid)
    {
        if($userid === qa_get_logged_in_userid()) {
            $buttons = '<a class="mdl-button mdl-button__block mdl-js-button mdl-button--raised mdl-js-ripple-effect" href="/account">プロフィール編集</a>';
        } else {
            $buttons = '<a class="mdl-button mdl-button__block mdl-js-button mdl-button--raised mdl-button--primary mdl-color-text--white mdl-js-ripple-effect">フォローする</a><a class="mdl-button mdl-button__block mdl-js-button mdl-button--raised mdl-button--primary mdl-color-text--white mdl-js-ripple-effect">メッセージ送信</a>';
        }
        return $buttons;
    }
    
    public static function crate_tab_header()
    {
        $html = '';
        $html .= '<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">'.PHP_EOL;
        $html .= '    <div class="mdl-tabs__tab-bar mdl-color--white margin--16px margin--bottom-0">'.PHP_EOL;
        $html .= '  <a class="mdl-tabs__tab is-active" href="#activities">'.qa_lang_html('cud_lang/activities').'</a>'.PHP_EOL;
        $html .= '  <a class="mdl-tabs__tab" href="#questions">'.qa_lang_html('cud_lang/questions').'</a>'.PHP_EOL;
        $html .= '  <a class="mdl-tabs__tab" href="#answers">'.qa_lang_html('cud_lang/answers').'</a>'.PHP_EOL;
        $html .= '  <a class="mdl-tabs__tab" href="#blogs">'.qa_lang_html('cud_lang/blogs').'</a>'.PHP_EOL;
        $html .= '</div>';
        
        return $html;
    }
    
    public static function create_tab_panel($list_type, $is_active)
    {
        $html = '';
        $active = $is_active ? 'is-active' : '';
        $html .= '<div class="mdl-tabs__panel '.$active.'" id="'.$list_type.'">'.PHP_EOL;
        $html .= '  <div class="qa-q-list q-list-'.$list_type.'">'.PHP_EOL;
        
        return $html;
    }
    
    public static function create_no_item_list($list_name)
    {
        $html = '';
        $html = '<section><div class="qa-a-list-item"><div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">';
        $html .= '<div class="mdl-card__supporting-text">';
        $html .= '<div class="qa-q-item-main">';
        $html .= qa_lang_html_sub('profile/no_posts_by_x', $list_name);
        $html .= "</div></div></div></div></section>";
        
        return $html;
    }
    
    public static function create_spinner()
    {
        $html .= '<div class="ias-spinner" style="align:center;"><span class="mdl-spinner mdl-js-spinner is-active" style="height:20px;width:20px;"></span></div>';
        return $html;
    }
}
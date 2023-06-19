<?php

/* common/developer.twig */
class __TwigTemplate_efaabdb32dde91a0311211387728ce74ad1fb9ddc33ad98d45ad3d0fb678a7a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"modal-dialog\">
  <div class=\"modal-content\">
    <div class=\"modal-header\">
      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
      <h4 class=\"modal-title\"><i class=\"fa fa-cog\"></i>";
        // line 5
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h4>
    </div>
    <div class=\"modal-body\">
      <table class=\"table table-bordered\">
        <thead>
          <tr>
            <td>";
        // line 11
        echo (isset($context["column_component"]) ? $context["column_component"] : null);
        echo "</td>
            
\t\t\t<td style=\"width: 200px;\">";
        // line 13
        echo (isset($context["entry_cache"]) ? $context["entry_cache"] : null);
        echo "</td>
\t\t
            <td class=\"text-right\" style=\"width: 1px;\">";
        // line 15
        echo (isset($context["column_action"]) ? $context["column_action"] : null);
        echo "</td>
          </tr>
        </thead>
        <tr>
          <td>";
        // line 19
        echo (isset($context["entry_theme"]) ? $context["entry_theme"] : null);
        echo "</td>
          <td ><div class=\"btn-group\" data-toggle=\"buttons\">";
        // line 20
        if ((isset($context["developer_theme"]) ? $context["developer_theme"] : null)) {
            // line 21
            echo "              <label class=\"btn btn-success active\"";
            if ( !(isset($context["eval"]) ? $context["eval"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
              <input type=\"radio\" name=\"developer_theme\" value=\"1\" autocomplete=\"off\"";
            // line 22
            if ( !(isset($context["eval"]) ? $context["eval"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo " checked/>";
            // line 23
            echo (isset($context["button_on"]) ? $context["button_on"] : null);
            echo "
              </label>";
        } else {
            // line 26
            echo "              <label class=\"btn btn-success\"";
            if ( !(isset($context["eval"]) ? $context["eval"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
              <input type=\"radio\" name=\"developer_theme\" value=\"1\" autocomplete=\"off\"";
            // line 27
            if ( !(isset($context["eval"]) ? $context["eval"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo "/>";
            // line 28
            echo (isset($context["button_on"]) ? $context["button_on"] : null);
            echo "
              </label>";
        }
        // line 32
        if ( !(isset($context["developer_theme"]) ? $context["developer_theme"] : null)) {
            // line 33
            echo "              <label class=\"btn btn-danger active\"";
            if ( !(isset($context["eval"]) ? $context["eval"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
              <input type=\"radio\" name=\"developer_theme\" value=\"0\" autocomplete=\"off\"";
            // line 34
            if ( !(isset($context["eval"]) ? $context["eval"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo " checked/>";
            // line 35
            echo (isset($context["button_off"]) ? $context["button_off"] : null);
            echo "
              </label>";
        } else {
            // line 38
            echo "              <label class=\"btn btn-danger\"";
            if ( !(isset($context["eval"]) ? $context["eval"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
              <input type=\"radio\" name=\"developer_theme\" value=\"0\" autocomplete=\"off\"";
            // line 39
            if ( !(isset($context["eval"]) ? $context["eval"] : null)) {
                echo "disabled=\"disabled\"";
            }
            echo "/>";
            // line 40
            echo (isset($context["button_off"]) ? $context["button_off"] : null);
            echo "
              </label>";
        }
        // line 42
        echo "</div></td>
          <td class=\"text-right\"><button type=\"button\" value=\"theme\" data-toggle=\"tooltip\" title=\"";
        // line 43
        echo (isset($context["button_refresh"]) ? $context["button_refresh"] : null);
        echo "\" class=\"btn btn-warning\"><i class=\"fa fa-refresh\"></i></button></td>
        </tr>
        <tr>
          <td>";
        // line 46
        echo (isset($context["entry_sass"]) ? $context["entry_sass"] : null);
        echo "</td>
          <td><div class=\"btn-group\" data-toggle=\"buttons\">";
        // line 47
        if ((isset($context["developer_sass"]) ? $context["developer_sass"] : null)) {
            // line 48
            echo "              <label class=\"btn btn-success active\">
                <input type=\"radio\" name=\"developer_sass\" value=\"1\" autocomplete=\"off\" checked>";
            // line 50
            echo (isset($context["button_on"]) ? $context["button_on"] : null);
            echo "</label>";
        } else {
            // line 52
            echo "              <label class=\"btn btn-success\">
                <input type=\"radio\" name=\"developer_sass\" value=\"1\" autocomplete=\"off\">";
            // line 54
            echo (isset($context["button_on"]) ? $context["button_on"] : null);
            echo "</label>";
        }
        // line 56
        if ( !(isset($context["developer_sass"]) ? $context["developer_sass"] : null)) {
            // line 57
            echo "              <label class=\"btn btn-danger active\">
                <input type=\"radio\" name=\"developer_sass\" value=\"0\" autocomplete=\"off\" checked>";
            // line 59
            echo (isset($context["button_off"]) ? $context["button_off"] : null);
            echo "</label>";
        } else {
            // line 61
            echo "              <label class=\"btn btn-danger\">
                <input type=\"radio\" name=\"developer_sass\" value=\"0\" autocomplete=\"off\">";
            // line 63
            echo (isset($context["button_off"]) ? $context["button_off"] : null);
            echo "</label>";
        }
        // line 64
        echo "</div></td>
          <td class=\"text-right\"><button type=\"button\" value=\"sass\" data-toggle=\"tooltip\" title=\"";
        // line 65
        echo (isset($context["button_refresh"]) ? $context["button_refresh"] : null);
        echo "\" class=\"btn btn-warning\"><i class=\"fa fa-refresh\"></i></button></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('input[name=\\'developer_theme\\'], input[name=\\'developer_sass\\']').on('change', function() {
\t\$.ajax({
\t\turl: 'index.php?route=common/developer/edit&user_token=";
        // line 74
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',\t\t
\t\ttype: 'post',
        data: \$('input[name=\\'developer_theme\\']:checked, input[name=\\'developer_sass\\']:checked'),
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('input[name=\\'developer_theme\\'], input[name=\\'developer_sass\\']').prop('disabled', true);
\t\t},
\t\tcomplete: function() {
\t\t\t\$('input[name=\\'developer_theme\\'], input[name=\\'developer_sass\\']').prop('disabled', false);
\t\t},
\t\tsuccess: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
            }

            if (json['success']) {
\t\t\t\t\$('#modal-developer .modal-body').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t}\t\t\t
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});\t
});\t

\$('#modal-developer table button').on('click', function() {
\tvar element = this;
\t
\t\$.ajax({
\t\turl: 'index.php?route=common/developer/' + \$(element).attr('value') + '&user_token=";
        // line 105
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',\t\t
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$(element).button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$(element).button('reset');
\t\t},
\t\tsuccess: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
            }

            if (json['success']) {
\t\t\t\t\$('#modal-developer .modal-body').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t}\t\t\t
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});
//--></script>
";
    }

    public function getTemplateName()
    {
        return "common/developer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 105,  187 => 74,  175 => 65,  172 => 64,  168 => 63,  165 => 61,  161 => 59,  158 => 57,  156 => 56,  152 => 54,  149 => 52,  145 => 50,  142 => 48,  140 => 47,  136 => 46,  130 => 43,  127 => 42,  122 => 40,  117 => 39,  110 => 38,  105 => 35,  100 => 34,  93 => 33,  91 => 32,  86 => 28,  81 => 27,  74 => 26,  69 => 23,  64 => 22,  57 => 21,  55 => 20,  51 => 19,  44 => 15,  39 => 13,  34 => 11,  25 => 5,  19 => 1,);
    }
}
/* <div class="modal-dialog">*/
/*   <div class="modal-content">*/
/*     <div class="modal-header">*/
/*       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>*/
/*       <h4 class="modal-title"><i class="fa fa-cog"></i> {{ heading_title }}</h4>*/
/*     </div>*/
/*     <div class="modal-body">*/
/*       <table class="table table-bordered">*/
/*         <thead>*/
/*           <tr>*/
/*             <td>{{ column_component }}</td>*/
/*             */
/* 			<td style="width: 200px;">{{ entry_cache }}</td>*/
/* 		*/
/*             <td class="text-right" style="width: 1px;">{{ column_action }}</td>*/
/*           </tr>*/
/*         </thead>*/
/*         <tr>*/
/*           <td>{{ entry_theme }}</td>*/
/*           <td ><div class="btn-group" data-toggle="buttons">{% if developer_theme %}*/
/*               <label class="btn btn-success active" {% if not eval %}disabled="disabled"{% endif %}>*/
/*               <input type="radio" name="developer_theme" value="1" autocomplete="off" {% if not eval %}disabled="disabled"{% endif %} checked/>*/
/*               {{ button_on }}*/
/*               </label>*/
/*               {% else %}*/
/*               <label class="btn btn-success" {% if not eval %}disabled="disabled"{% endif %}>*/
/*               <input type="radio" name="developer_theme" value="1" autocomplete="off" {% if not eval %}disabled="disabled"{% endif %}/>*/
/*               {{ button_on }}*/
/*               </label>*/
/*               {% endif %}*/
/*               */
/*               {% if not developer_theme %}*/
/*               <label class="btn btn-danger active" {% if not eval %}disabled="disabled"{% endif %}>*/
/*               <input type="radio" name="developer_theme" value="0" autocomplete="off" {% if not eval %}disabled="disabled"{% endif %} checked/>*/
/*               {{ button_off }}*/
/*               </label>*/
/*               {% else %}*/
/*               <label class="btn btn-danger" {% if not eval %}disabled="disabled"{% endif %}>*/
/*               <input type="radio" name="developer_theme" value="0" autocomplete="off" {% if not eval %}disabled="disabled"{% endif %}/>*/
/*               {{ button_off }}*/
/*               </label>*/
/*               {% endif %}</div></td>*/
/*           <td class="text-right"><button type="button" value="theme" data-toggle="tooltip" title="{{ button_refresh }}" class="btn btn-warning"><i class="fa fa-refresh"></i></button></td>*/
/*         </tr>*/
/*         <tr>*/
/*           <td>{{ entry_sass }}</td>*/
/*           <td><div class="btn-group" data-toggle="buttons">{% if developer_sass %}*/
/*               <label class="btn btn-success active">*/
/*                 <input type="radio" name="developer_sass" value="1" autocomplete="off" checked>*/
/*                 {{ button_on }}</label>*/
/*               {% else %}*/
/*               <label class="btn btn-success">*/
/*                 <input type="radio" name="developer_sass" value="1" autocomplete="off">*/
/*                 {{ button_on }}</label>*/
/*               {% endif %}*/
/*               {% if not developer_sass %}*/
/*               <label class="btn btn-danger active">*/
/*                 <input type="radio" name="developer_sass" value="0" autocomplete="off" checked>*/
/*                 {{ button_off }}</label>*/
/*               {% else %}*/
/*               <label class="btn btn-danger">*/
/*                 <input type="radio" name="developer_sass" value="0" autocomplete="off">*/
/*                 {{ button_off }}</label>*/
/*               {% endif %}</div></td>*/
/*           <td class="text-right"><button type="button" value="sass" data-toggle="tooltip" title="{{ button_refresh }}" class="btn btn-warning"><i class="fa fa-refresh"></i></button></td>*/
/*         </tr>*/
/*       </table>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* <script type="text/javascript"><!--*/
/* $('input[name=\'developer_theme\'], input[name=\'developer_sass\']').on('change', function() {*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=common/developer/edit&user_token={{ user_token }}',		*/
/* 		type: 'post',*/
/*         data: $('input[name=\'developer_theme\']:checked, input[name=\'developer_sass\']:checked'),*/
/* 		dataType: 'json',*/
/* 		beforeSend: function() {*/
/* 			$('input[name=\'developer_theme\'], input[name=\'developer_sass\']').prop('disabled', true);*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('input[name=\'developer_theme\'], input[name=\'developer_sass\']').prop('disabled', false);*/
/* 		},*/
/* 		success: function(json) {*/
/*             $('.alert-dismissible').remove();*/
/* */
/*             if (json['error']) {*/
/*                 $('#modal-developer .modal-body').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
/*             }*/
/* */
/*             if (json['success']) {*/
/* 				$('#modal-developer .modal-body').prepend('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
/* 			}			*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});	*/
/* });	*/
/* */
/* $('#modal-developer table button').on('click', function() {*/
/* 	var element = this;*/
/* 	*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=common/developer/' + $(element).attr('value') + '&user_token={{ user_token }}',		*/
/* 		dataType: 'json',*/
/* 		beforeSend: function() {*/
/* 			$(element).button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$(element).button('reset');*/
/* 		},*/
/* 		success: function(json) {*/
/*             $('.alert-dismissible').remove();*/
/* */
/*             if (json['error']) {*/
/*                 $('#modal-developer .modal-body').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
/*             }*/
/* */
/*             if (json['success']) {*/
/* 				$('#modal-developer .modal-body').prepend('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
/* 			}			*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* //--></script>*/
/* */

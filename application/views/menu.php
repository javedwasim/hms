<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<?php foreach ($menus as $menu) { ?>
    <li <?php if (isset($menu->children)) { ?> class="treeview" <?php } ?>>
        <a class="ahref" data-href="<?php if (!empty($menu->parent_menu_link)) {
            echo  $menu->parent_menu_link;
        } else {
            echo "#";
        } ?>" href="javascript:void(0)" id="<?php echo $menu->menu_name;  ?>"
            <?php if (!empty($menu->menu_collapser_id)) {
            echo 'id="' . $menu->menu_collapser_id . '"';
        } ?>>
            <i class="<?php echo $menu->menu_icon; ?>"></i>
            <span><?php echo $menu->menu_name; ?></span>
            <span class="pull-right-container">
                <?php if (isset($menu->children)) { ?>
                    <i class="fa fa-plus-circle pull-right"></i>
                <?php } ?>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php if (isset($menu->children)) {
                foreach ($menu->children as $child) { // print_r($child);
                    //echo  $menu->subchildId;

                    ?>
                    <li class="menu-li">
                        <?php if(!empty($child->child_menu_url)) {
                            $link =  $base_url . $child->child_menu_url;
                           }else{
                               $link = '';
                           }
                           echo '<a class="ahref" href="javascript:void(0)" data-href = '.$child->child_menu_url.' id="'.$child->child_menu_id.'">';
                           echo '<i class="fa fa-circle-o"></i>';
                           echo $child->child_menu_name;
                           echo '</a>'; ?>
                        <?php $subChild = $this->model_menu->submenu($child->child_menu_id);
                        if (!empty($subChild)) { ?>
                            <ul class="slide" style="display: none">
                                <?php foreach ($subChild as $s_child) { ?>
                                    <li>
                                        <a  href="<?php echo $base_url . $s_child['subchild_url']; ?>">
                                            <i class="fa fa-circle-o"></i>
                                            <?php echo $s_child['subchildName']; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php
                        } ?>
                    </li>
                <?php }
            } ?>
        </ul>
    </li>
<?php } ?>
<script>
    $('.ahref').click(function(){
        var func_call = $(this).attr('data-href');
        get_patient_accounts(func_call);
    });
</script>

<script>
    $(document).ready(function(){
        $(".ahref").click(function(){
            setMenuId(this.id);
            $(".ahref").removeClass("active_menu");
            var menuID = this.id;
            $('#'+menuID).addClass('active_menu')
        });
//        var menuID = ('<?php //echo $this->session->userdata('menu_id');?>//');
//        $("#"+menuID).parent().parent().parent().children().find(".fa-plus-circle").removeClass('fa-plus-circle').addClass('fa-minus-circle');
//        $("#"+menuID).parent().parent().css("display","block");
//         var liClass = $("#"+menuID).parent().attr("class");
//         $('.'+liClass).removeClass('active_menu');
//        $("#"+menuID).parent().addClass('active_menu');
    });
</script>
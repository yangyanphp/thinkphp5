<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:56:"C:\xampp\htdocs\thinkphp5/app/admin\view\order\apply.php";i:1534743451;s:51:"C:\xampp\htdocs\thinkphp5\app\admin\view\layout.php";i:1534643663;s:57:"C:\xampp\htdocs\thinkphp5\app\admin\view\block\header.php";i:1534643663;s:55:"C:\xampp\htdocs\thinkphp5\app\admin\view\block\menu.php";i:1534643663;s:56:"C:\xampp\htdocs\thinkphp5\app\admin\view\block\layui.php";i:1534643663;s:57:"C:\xampp\htdocs\thinkphp5\app\admin\view\block\footer.php";i:1534643663;}*/ ?>
<?php if(input('param.hisi_iframe') || cookie('hisi_iframe')): ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_admin_menu_current['title']; ?> -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="/static/admin/js/layui/css/layui.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/admin/css/theme.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/admin/css/style.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/typicons/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/font-awesome/min.css?v=<?php echo config('hisiphp.version'); ?>">
</head>
<body class="hisi-theme-<?php echo cookie('hisi_admin_theme'); ?>">
<div style="padding:0 10px;" class="mcolor"><?php echo runhook('system_admin_tips'); ?></div>
<?php else: ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php if($_admin_menu_current['url'] == 'admin/index/index'): ?>管理控制台<?php else: ?><?php echo $_admin_menu_current['title']; endif; ?> -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="/static/admin/js/layui/css/layui.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/admin/css/theme.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/admin/css/style.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/typicons/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/font-awesome/min.css?v=<?php echo config('hisiphp.version'); ?>">
</head>
<body class="hisi-theme-<?php echo cookie('hisi_admin_theme'); ?>">
<?php 
$ca = strtolower(request()->controller().'/'.request()->action());
 ?>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header" style="z-index:999!important;">
    <div class="fl header-logo">管理控制台</div>
    <div class="fl header-fold"><a href="javascript:;" title="打开/关闭左侧导航" class="aicon ai-caidan" id="foldSwitch"></a></div>
    <ul class="layui-nav fl nobg main-nav">
        <?php if(is_array($_admin_menu) || $_admin_menu instanceof \think\Collection || $_admin_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $_admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(($_admin_menu_parents['pid'] == $vo['id'] and $ca != 'plugins/run') or ($ca == 'plugins/run' and $vo['id'] == 3)): ?>
           <li class="layui-nav-item layui-this">
            <?php else: ?>
            <li class="layui-nav-item">
            <?php endif; ?> 
            <a href="javascript:;"><?php echo $vo['title']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <ul class="layui-nav fr nobg head-info">
        <li class="layui-nav-item"><a href="/" target="_blank" class="aicon ai-ai-home" title="前台"></a></li>
        <li class="layui-nav-item"><a href="<?php echo url('admin/index/clear'); ?>" class="j-ajax aicon ai-qingchu" refresh="yes" title="清缓存"></a></li>
        <li class="layui-nav-item"><a href="javascript:void(0);" class="aicon ai-suo" id="lockScreen" title="锁屏"></a></li>
        <li class="layui-nav-item">
            <a href="<?php echo url('admin/user/setTheme'); ?>" id="admin-theme-setting" class="aicon ai-theme"></a>
        </li>
        <li class="layui-nav-item">
            <a href="javascript:void(0);"><?php echo $admin_user['nick']; ?>&nbsp;&nbsp;</a>
            <dl class="layui-nav-child">
                <dd><a data-id="00" class="admin-nav-item top-nav-item" href="<?php echo url('admin/user/info'); ?>">个人设置</a></dd>
                <dd><a href="<?php echo url('admin/user/iframe'); ?>" class="j-ajax" refresh="yes"><?php echo input('cookie.hisi_iframe') ? '单页布局' : '框架布局'; ?></a></dd>
                <?php if(is_array($languages) || $languages instanceof \think\Collection || $languages instanceof \think\Paginator): $i = 0; $__LIST__ = $languages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pack']): ?>
                    <dd><a href="<?php echo url('admin/index/index'); ?>?lang=<?php echo $vo['code']; ?>"><?php echo $vo['name']; ?></a></dd>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <dd><a data-id="000" class="admin-nav-item top-nav-item" href="<?php echo url('admin/language/index'); ?>">语言包管理</a></dd>
                <dd><a href="<?php echo url('admin/publics/logout'); ?>">退出登陆</a></dd>
            </dl>
        </li>
    </ul>
</div>
<div class="layui-side layui-bg-black" id="switchNav">
    <div class="layui-side-scroll">
        <?php if(is_array($_admin_menu) || $_admin_menu instanceof \think\Collection || $_admin_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $_admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(($_admin_menu_parents['pid'] == $v['id'] and $ca != 'plugins/run') or ($ca == 'plugins/run' and $v['id'] == 3)): ?>
        <ul class="layui-nav layui-nav-tree">
        <?php else: ?>
        <ul class="layui-nav layui-nav-tree" style="display:none;">
        <?php endif; if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
            <li class="layui-nav-item <?php if($kk == 1): ?>layui-nav-itemed<?php endif; ?>">
                <a href="javascript:;"><i class="<?php echo $vv['icon']; ?>"></i><?php echo $vv['title']; ?><span class="layui-nav-more"></span></a>
                <dl class="layui-nav-child">
                    <?php if($vv['title'] == '快捷菜单'): ?>
                        <dd><a class="admin-nav-item" href="<?php echo url('admin/index/index'); ?>"><i class="aicon ai-shouye"></i> 后台首页</a></dd>
                        <?php if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>
                        <dd><a class="admin-nav-item" data-id="<?php echo $vvv['id']; ?>" href="<?php if(strpos('http', $vvv['url']) === false): ?>/<?php echo config('sys.admin_path').'/'.$vvv['url']; if($vvv['param']): ?>?<?php echo $vvv['param']; endif; else: ?><?php echo $vvv['url']; endif; ?>"><?php if(file_exists('.'.$vvv['icon'])): ?><img src="<?php echo $vvv['icon']; ?>" width="16" height="16" /><?php else: ?><i class="<?php echo $vvv['icon']; ?>"></i><?php endif; ?> <?php echo $vvv['title']; ?></a><i data-href="<?php echo url('menu/del?ids='.$vvv['id']); ?>" class="layui-icon j-del-menu">&#xe640;</i></dd>
                        <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>
                        <dd><a class="admin-nav-item" data-id="<?php echo $vvv['id']; ?>" href="<?php if(strpos('http', $vvv['url']) === false): ?>/<?php echo config('sys.admin_path').'/'.$vvv['url']; if($vvv['param']): ?>?<?php echo $vvv['param']; endif; else: ?><?php echo $vvv['url']; endif; ?>"><?php if(file_exists('.'.$vvv['icon'])): ?><img src="<?php echo $vvv['icon']; ?>" width="16" height="16" /><?php else: ?><i class="<?php echo $vvv['icon']; ?>"></i><?php endif; ?> <?php echo $vvv['title']; ?></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </dl>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<script type="text/html" id="hisi-theme-tpl">
    <ul class="hisi-themes">
        <?php $_result=session('hisi_admin_themes');if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li data-theme="<?php echo $vo; ?>" class="hisi-theme-item-<?php echo $vo; ?>"></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</script>
    <div class="layui-body" id="switchBody">
        <ul class="bread-crumbs">
            <?php if(is_array($_bread_crumbs) || $_bread_crumbs instanceof \think\Collection || $_bread_crumbs instanceof \think\Paginator): $i = 0; $__LIST__ = $_bread_crumbs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($key > 0 && $i != count($_bread_crumbs)): ?>
                    <li>></li>
                    <li><a href="<?php echo url($v['url'].'?'.$v['param']); ?>"><?php echo $v['title']; ?></a></li>
                <?php elseif($i == count($_bread_crumbs)): ?>
                    <li>></li>
                    <li><a href="javascript:void(0);"><?php echo $v['title']; ?></a></li>
                <?php else: ?>
                    <li><a href="javascript:void(0);"><?php echo $v['title']; ?></a></li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <li><a href="<?php echo url('admin/menu/quick?id='.$_admin_menu_current['id']); ?>" title="添加到首页快捷菜单" class="j-ajax">[+]</a></li>
        </ul>
        <div style="padding:0 10px;" class="mcolor"><?php echo runhook('system_admin_tips'); ?></div>
        <div class="page-body">
<?php endif; switch($tab_type): case "1": ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($tab_data['menu']) || $tab_data['menu'] instanceof \think\Collection || $tab_data['menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_data['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['url'] == $_admin_menu_current['url'] or (url($vo['url']) == $tab_data['current'])): ?>
                    <li class="layui-this">
                    <?php else: ?>
                    <li>
                    <?php endif; if(substr($vo['url'], 0, 4) == 'http'): ?>
                        <a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a>
                    <?php else: ?>
                        <a href="<?php echo url($vo['url']); ?>"><?php echo $vo['title']; ?></a>
                    <?php endif; ?>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <div class="layui-tab-item layui-show">
                    <script src="/static/admin/js/jquery-1.9.1.min.js"></script>
<div class="page-filter fr">
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
        <div class="layui-form-item">
            <label ><input class="layui-form-label" type="submit"></label>
            <div class="layui-input-inline">
                <input type="text" name="q" value="<?php echo input('get.q'); ?>" lay-verify="required" placeholder="游戏ID,订单号" autocomplete="off" class="layui-input">

            </div>
            <div class="layui-input-inline">
            <select name="Status">
                <option value ="" >全部</option>
                <option value ="2">已完成</option>
                <option value ="1">待处理</option>
                <option value ="0">未支付</option>
            </select>
            </div>
        </div>
    </form>
</div>
<form id="pageListForm">
    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
            </colgroup>
            <thead>
            <tr>
                <th>UID</th>
                <th>游戏ID</th>
                <th>昵称</th>
                <th>金额</th>
                <th>支付宝账号</th>
                <th>订单生成时间</th>
                <th>订单状态</th>
                <th>审核</th>
            </tr>
            </thead>
            <tbody>

            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td class="font12"><?php echo $vo['UserID']; ?></td>

                <td class="font12"><?php echo getSpreaderGameID($vo['UserID']); ?></td>

                <td class="font12"><?php echo $vo['UserName']; ?></td>
                <td class="font12"><?php echo $vo['Bonus']; ?></td>
                <td class="font12"><?php echo $vo['AccountNumber']; ?></td>
                <td class="font12"><?php echo $vo['Time']; ?></td>
                <?php if($vo['Status'] == 0){ ?>
                    <td style="color:red">未审核</td>
                <?php }elseif($vo['Status']  == 1){ ?>
                    <td  style="color:green">已审核</td>
               <?php }?>
               <td class="font12">
                   <?php if($vo['Status'] == 1){ ?>
                       <a  class="layui-btn layui-btn-xs layui-btn-normal">已完成</a>
                   <?php }elseif($vo['Status']  == 0){ ?>
                       <a href="<?php echo url('updatestatus?ID='.$vo['ID']); ?>"  onClick="return   layer.confirm('确定审核？',{btn: ['确定','取消'] }, function(){ return true;}else{ return false;})" class="layui-btn layui-btn-xs layui-btn-normal">审核</a>
                   <?php }?>
               </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $pages; ?>
    </div>
</form>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>";
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>


                </div>
            </div>
        </div>
    <?php break; case "2": ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($tab_data['menu']) || $tab_data['menu'] instanceof \think\Collection || $tab_data['menu'] instanceof \think\Paginator): $k = 0; $__LIST__ = $tab_data['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($k == 1): ?>
                    <li class="layui-this">
                    <?php else: ?>
                    <li>
                    <?php endif; ?>
                    <a href="javascript:;"><?php echo $vo['title']; ?></a>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <script src="/static/admin/js/jquery-1.9.1.min.js"></script>
<div class="page-filter fr">
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
        <div class="layui-form-item">
            <label ><input class="layui-form-label" type="submit"></label>
            <div class="layui-input-inline">
                <input type="text" name="q" value="<?php echo input('get.q'); ?>" lay-verify="required" placeholder="游戏ID,订单号" autocomplete="off" class="layui-input">

            </div>
            <div class="layui-input-inline">
            <select name="Status">
                <option value ="" >全部</option>
                <option value ="2">已完成</option>
                <option value ="1">待处理</option>
                <option value ="0">未支付</option>
            </select>
            </div>
        </div>
    </form>
</div>
<form id="pageListForm">
    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
            </colgroup>
            <thead>
            <tr>
                <th>UID</th>
                <th>游戏ID</th>
                <th>昵称</th>
                <th>金额</th>
                <th>支付宝账号</th>
                <th>订单生成时间</th>
                <th>订单状态</th>
                <th>审核</th>
            </tr>
            </thead>
            <tbody>

            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td class="font12"><?php echo $vo['UserID']; ?></td>

                <td class="font12"><?php echo getSpreaderGameID($vo['UserID']); ?></td>

                <td class="font12"><?php echo $vo['UserName']; ?></td>
                <td class="font12"><?php echo $vo['Bonus']; ?></td>
                <td class="font12"><?php echo $vo['AccountNumber']; ?></td>
                <td class="font12"><?php echo $vo['Time']; ?></td>
                <?php if($vo['Status'] == 0){ ?>
                    <td style="color:red">未审核</td>
                <?php }elseif($vo['Status']  == 1){ ?>
                    <td  style="color:green">已审核</td>
               <?php }?>
               <td class="font12">
                   <?php if($vo['Status'] == 1){ ?>
                       <a  class="layui-btn layui-btn-xs layui-btn-normal">已完成</a>
                   <?php }elseif($vo['Status']  == 0){ ?>
                       <a href="<?php echo url('updatestatus?ID='.$vo['ID']); ?>"  onClick="return   layer.confirm('确定审核？',{btn: ['确定','取消'] }, function(){ return true;}else{ return false;})" class="layui-btn layui-btn-xs layui-btn-normal">审核</a>
                   <?php }?>
               </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $pages; ?>
    </div>
</form>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>";
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>


            </div>
        </div>
    <?php break; case "3": ?>
    
        <script src="/static/admin/js/jquery-1.9.1.min.js"></script>
<div class="page-filter fr">
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
        <div class="layui-form-item">
            <label ><input class="layui-form-label" type="submit"></label>
            <div class="layui-input-inline">
                <input type="text" name="q" value="<?php echo input('get.q'); ?>" lay-verify="required" placeholder="游戏ID,订单号" autocomplete="off" class="layui-input">

            </div>
            <div class="layui-input-inline">
            <select name="Status">
                <option value ="" >全部</option>
                <option value ="2">已完成</option>
                <option value ="1">待处理</option>
                <option value ="0">未支付</option>
            </select>
            </div>
        </div>
    </form>
</div>
<form id="pageListForm">
    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
            </colgroup>
            <thead>
            <tr>
                <th>UID</th>
                <th>游戏ID</th>
                <th>昵称</th>
                <th>金额</th>
                <th>支付宝账号</th>
                <th>订单生成时间</th>
                <th>订单状态</th>
                <th>审核</th>
            </tr>
            </thead>
            <tbody>

            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td class="font12"><?php echo $vo['UserID']; ?></td>

                <td class="font12"><?php echo getSpreaderGameID($vo['UserID']); ?></td>

                <td class="font12"><?php echo $vo['UserName']; ?></td>
                <td class="font12"><?php echo $vo['Bonus']; ?></td>
                <td class="font12"><?php echo $vo['AccountNumber']; ?></td>
                <td class="font12"><?php echo $vo['Time']; ?></td>
                <?php if($vo['Status'] == 0){ ?>
                    <td style="color:red">未审核</td>
                <?php }elseif($vo['Status']  == 1){ ?>
                    <td  style="color:green">已审核</td>
               <?php }?>
               <td class="font12">
                   <?php if($vo['Status'] == 1){ ?>
                       <a  class="layui-btn layui-btn-xs layui-btn-normal">已完成</a>
                   <?php }elseif($vo['Status']  == 0){ ?>
                       <a href="<?php echo url('updatestatus?ID='.$vo['ID']); ?>"  onClick="return   layer.confirm('确定审核？',{btn: ['确定','取消'] }, function(){ return true;}else{ return false;})" class="layui-btn layui-btn-xs layui-btn-normal">审核</a>
                   <?php }?>
               </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $pages; ?>
    </div>
</form>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>";
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>


    <?php break; default: ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <li class="layui-this">
                    <a href="javascript:;" id="curTitle"><?php echo $_admin_menu_current['title']; ?></a>
                </li>
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <div class="layui-tab-item layui-show">
                    <script src="/static/admin/js/jquery-1.9.1.min.js"></script>
<div class="page-filter fr">
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="get">
        <div class="layui-form-item">
            <label ><input class="layui-form-label" type="submit"></label>
            <div class="layui-input-inline">
                <input type="text" name="q" value="<?php echo input('get.q'); ?>" lay-verify="required" placeholder="游戏ID,订单号" autocomplete="off" class="layui-input">

            </div>
            <div class="layui-input-inline">
            <select name="Status">
                <option value ="" >全部</option>
                <option value ="2">已完成</option>
                <option value ="1">待处理</option>
                <option value ="0">未支付</option>
            </select>
            </div>
        </div>
    </form>
</div>
<form id="pageListForm">
    <div class="layui-form">
        <table class="layui-table mt10" lay-even="" lay-skin="row">
            <colgroup>
                <col width="50">
            </colgroup>
            <thead>
            <tr>
                <th>UID</th>
                <th>游戏ID</th>
                <th>昵称</th>
                <th>金额</th>
                <th>支付宝账号</th>
                <th>订单生成时间</th>
                <th>订单状态</th>
                <th>审核</th>
            </tr>
            </thead>
            <tbody>

            <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td class="font12"><?php echo $vo['UserID']; ?></td>

                <td class="font12"><?php echo getSpreaderGameID($vo['UserID']); ?></td>

                <td class="font12"><?php echo $vo['UserName']; ?></td>
                <td class="font12"><?php echo $vo['Bonus']; ?></td>
                <td class="font12"><?php echo $vo['AccountNumber']; ?></td>
                <td class="font12"><?php echo $vo['Time']; ?></td>
                <?php if($vo['Status'] == 0){ ?>
                    <td style="color:red">未审核</td>
                <?php }elseif($vo['Status']  == 1){ ?>
                    <td  style="color:green">已审核</td>
               <?php }?>
               <td class="font12">
                   <?php if($vo['Status'] == 1){ ?>
                       <a  class="layui-btn layui-btn-xs layui-btn-normal">已完成</a>
                   <?php }elseif($vo['Status']  == 0){ ?>
                       <a href="<?php echo url('updatestatus?ID='.$vo['ID']); ?>"  onClick="return   layer.confirm('确定审核？',{btn: ['确定','取消'] }, function(){ return true;}else{ return false;})" class="layui-btn layui-btn-xs layui-btn-normal">审核</a>
                   <?php }?>
               </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $pages; ?>
    </div>
</form>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>";
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>


                </div>
            </div>
        </div>
<?php endswitch; if(input('param.hisi_iframe') || cookie('hisi_iframe')): ?>
</body>
</html>
<?php else: ?>
        </div>
    </div>
    <div class="layui-footer footer">
        <span class="fl">Powered by <a href="<?php echo config('hisiphp.url'); ?>" target="_blank"><?php echo config('hisiphp.name'); ?></a> v<?php echo config('hisiphp.version'); ?></span>
        <span class="fr"> © 2017-2018 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank"><?php echo config('hisiphp.copyright'); ?></a> All Rights Reserved.</span>
    </div>
</div>
</body>
</html>
<?php endif; ?>
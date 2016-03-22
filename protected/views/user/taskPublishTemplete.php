<link href="<?php echo VERSION2;?>taskcss/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/button.css">
<link rel="stylesheet" type="text/css" href="<?php echo VERSION2;?>taskcss/mm.css">
<?php
    echo $this->renderPartial('/user/taobaoTaskNav');//载入淘宝大厅导航
?>
<div id="content">
  <div class="h15"></div>
  <a id="mao1"></a>
  <div id="body_main" style="background-color:#fff;margin:30px auto;">
    <?php
        $this->renderPartial('/user/taskPublishNav');//加载发布任务公共导航
    ?>
    <div class="cle"></div>
    <div class="reListTitle">
      <table width="1000" border="0" cellspacing="0" cellpadding="4" id="tpl">
        <thead>
          <tr>
            <th class="id">模板名称</th>
            <th class="poster">掌柜/商品网址</th>
            <th class="price">任务价格</th>
            <th class="oktime">任务要求</th>
            <th class="poster">限制</th>
            <th class="do">操作</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
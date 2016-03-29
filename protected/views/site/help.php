<div class="help-nav">
    <div class="nav-content">
    <span class="help-search"><form action="" method=""><input class="text-search" type="text" name="keyword" placeholder="请输入您的问题按回车键确认" /><input class="help_submit" type="submit" /></form></span>
    <div class="help-search-right">
    <?php 
    $helpNav = Articlecatlog::model()->findAll(array('select'=>'id,name','order'=>'sort asc'));
    foreach($helpNav as $k=>$item){
    ?>
    <a <?php if($k==0) echo $active = 'class="nav-content-active"';?> href="<?php echo $this->createUrl('help',array('cid'=>$item->id));?>"><?php echo $item->name; ?></a>
    <?php }?></div>
    </div>
</div>
    <div class="help"><!--新手帮助-->
        <?php
            foreach($articleInfo as $item){
        ?>
        <div class="newstt">
            <div class="newsrtr">
               <div class="newsby">
                  <p class="nttl"><a href="<?php echo $this->createUrl('news/deatailInfo',array('id'=>$item->goods_id,'catlogid'=>$item->cat_id));?>" target="_blank"><?php echo $item->goods_name;?></a></p>
                  <p></p>
                  <p class="newsfoot"><span><?php echo date('Y-m-d',$item->add_time);?></span> <span>阅读 <?php echo $item->click_count;?></span></p>
               </div>
            </div>
        </div>
        <?php }?>
        <div class="breakpage"><!--分页开始-->
            <?php
                $this->widget('help', array(
                    'selectedPageCssClass'=>'active',
                    'pages' => $pages,
                    'lastPageLabel' => '最后一页',
                    'firstPageLabel' => '第一页',
                    'header' => false,
                    'nextPageLabel' => ">>",
                    'prevPageLabel' => "<<",
                ));
            ?>
        </div><!--分页结束-->
    </div><!--新手帮助 end-->
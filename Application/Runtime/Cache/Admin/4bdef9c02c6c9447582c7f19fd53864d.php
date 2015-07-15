<?php if (!defined('THINK_PATH')) exit();?>

    <link rel="stylesheet" href="/hszz/TP/Public/Admin/Keywords/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/hszz/TP/Public/Admin/Keywords/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/hszz/TP/Public/Admin/Keywords/css/uniform.css" />
    <link rel="stylesheet" href="/hszz/TP/Public/Admin/Keywords/css/select2.css" />
    <link rel="stylesheet" href="/hszz/TP/Public/Admin/Keywords/css/matrix-style.css" />
    <link rel="stylesheet" href="/hszz/TP/Public/Admin/Keywords/css/matrix-media.css" />
    <link href="/hszz/TP/Public/Admin/Keywords/css/font-awesome.css" rel="stylesheet" />
    <style>
        td.text-center {
            text-align:center;
        }
        a.title-link {
            color:#0066ff;
        }
        p.edit, span.kw {
            padding:2px;
            margin:0;
            cursor:pointer;
        }
        span.kw {
            display:inline;
            padding-right:20px;
            width: 30%;
        }
		body{background-color:white;}
		
    </style>
    <div id="breadcrumb">
	   
        <a href="/hszz/TP/admin.php/index/index.html" title="返回系统主页" class="tip-bottom" style="color:blue">
            <i class="icon-home"></i>
            <h3><b>返回后台首页</b> </h3>
            
        </a>
		
    </div>
    <h2 style="margin-top:10px;">热搜词管理</h2>



    <div class="container-fluid">
        <hr style="margin:0;">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon">
              <input type="checkbox" id="title-checkbox" name="title-checkbox" />
            </span>
            <h5>关键词列表 （共<?php echo ($counts); ?>条记录）</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="/hszz/TP/admin.php/Keywords/batchDelete" method="post">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th style="width:5%;">编号</th>
                  <th>关键字</th>
                  <th style="width:10%;">累积次数</th>
                  <th style="width:80px;">操作</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($kw)): foreach($kw as $key=>$kw): ?><tr>
                      <td style="width:22px"><input type="checkbox" name="ids[]" value="<?php echo ($kw["keywords_id"]); ?>" /></td>
                      <td class="text-center" ><?php echo ($kw["keywords_id"]); ?></td>
                      <td><span class="kw" data-id="<?php echo ($kw["keywords_id"]); ?>" style="font-size:20px"><?php echo ($kw["keywords_keyword"]); ?></span></td>
                      <td class="text-center">
                          <p class="edit" data-id="<?php echo ($kw["keywords_id"]); ?>" title="双击编辑"><?php echo ($kw["keywords_times"]); ?></p>
                      </td>
                      <td class="text-center">
                          <a href="/hszz/TP/admin.php/Keywords/delete/id/<?php echo ($kw["keywords_id"]); ?>" title="删除" class="btn btn-danger btn-mini"> <i class="icon-trash"></i> 删除</a>
                      </td>
                    </tr><?php endforeach; endif; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5">
                      <button type="submit" name="do_batch" class="btn btn-danger" style="margin-top:16px;"><i class="icon-trash"></i> 批量删除</button>
                      <a  href="#myAlert" data-toggle="modal" class="btn btn-info" style="margin-top:16px;"><i class=" icon-plus"></i> 添加</a>
                      <div class="pagination alternate text-right pull-right">
                          <?php echo ($page); ?>
                      </div>
                  </td>
                </tr>
              </tfoot>
            </table>
            </form>
          </div>
        </div>
            </div>
        </div>
    </div>
<div id="myAlert" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>添加热搜词</h3>
    </div>
    <div class="modal-body">
        <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">关键字 :</label>
              <div class="controls">
                <input type="text" class="span2" id="k" style="height:30px" placeholder="关键字...">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">搜索次数 :</label>
              <div class="controls">
                <input type="number" class="span2" id="t" style="height:30px" placeholder="搜索次数...">
              </div>
            </div>
          </form>
    </div>
    <div class="modal-footer"> 
        <span style="padding-right:20px; display:none; color:green;" id="add-ok"><i class="icon-ok"></i> 添加成功</span>
        <a class="btn btn-primary" id="add-keyword" href="javascript:void(0)">添加</a> 
        <a class="btn" id="add-close" href="javascript:void(0)">关闭</a> 
    </div>
</div>


    <script src="/hszz/TP/Public/Admin/Keywords/js/jquery.min.js"></script> 
    <script src="/hszz/TP/Public/Admin/Keywords/js/jquery.ui.custom.js"></script> 
    <script src="/hszz/TP/Public/Admin/Keywords/js/bootstrap.min.js"></script> 
    <script src="/hszz/TP/Public/Admin/Keywords/js/jquery.uniform.js"></script> 
    <script src="/hszz/TP/Public/Admin/Keywords/js/select2.min.js"></script> 
    <script src="/hszz/TP/Public/Admin/Keywords/js/jquery.dataTables.min.js"></script> 
    <script src="/hszz/TP/Public/Admin/Keywords/js/matrix.js"></script> 
    <script src="/hszz/TP/Public/Admin/Keywords/js/matrix.tables.js"></script>

<!-- js文件模块 结束 -->

<!-- ===================================================== -->

<!-- 底部JS执行区域 开始 -->

    <script>
        var saveTimesURL = '/hszz/TP/admin.php/Keywords/saveTimes';
        var saveKWURL = '/hszz/TP/admin.php/Keywords/saveKeyword';
        var saveAddKT    = '/hszz/TP/admin.php/Keywords/saveAddKT';

        $('#add-keyword').click(function (){
            var k = $('#k').val();
            var t = $('#t').val();
            var data = { 
                'keywords_keyword': k,
                'keywords_times':   t
            };
            $.post(saveAddKT, data, function (d){
                if (d == 1)
                {
                    $('#add-ok').show();
                }
            });
        });        

        $('#add-close').click(function (){
            location.reload();
        });
    </script>
    <script src="/hszz/TP/Public/Admin/Keywords/js/ajax.keywords.js"></script>
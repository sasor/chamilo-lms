<?php
/* For licensing terms, see /license.txt */

/**
 *	Code library for HotPotatoes integration.
 *	@package chamilo.exercise
 * 	@author Istvan Mandak
 */

/*	Included libraries */

require '../inc/global.inc.php';
require_once api_get_path(LIBRARY_PATH).'fileManage.lib.php';
$time = time();
require_once api_get_path(SYS_CODE_PATH).'exercice/hotpotatoes.lib.php';

header('Content-Type: text/html; charset='.api_get_system_encoding());

// Initialization
$doc_url = str_replace(array('../', '\\', '\\0', '..'), array('', '', '', ''), urldecode($_GET['file']));
$cid = api_get_course_id();
$document_path = api_get_path(SYS_COURSE_PATH).$_course['path'].'/document';
$document_web_path = api_get_path(WEB_COURSE_PATH).$_course['path'].'/document';
$origin = $_REQUEST['origin'];
$learnpath_id = $_REQUEST['learnpath_id'];
$learnpath_item_id = $_REQUEST['learnpath_item_id'];
$time = $_REQUEST['time'];

// Read content
$full_file_path = $document_path.$doc_url;
my_delete($full_file_path.$_user['user_id'].'.t.html');
$content = ReadFileCont($full_file_path.$_user['user_id'].'.t.html');

if ($content == '') {

	$content = ReadFileCont($full_file_path);
	$mit = "function Finish(){";

	$js_content = "var SaveScoreVariable = 0; // This variable included by Dokeos System\n".
				"function mySaveScore() // This function included by Dokeos System\n".
				"{\n".
				"   if (SaveScoreVariable==0)\n".
				"		{\n".
				"			SaveScoreVariable = 1;\n".
				"			if (C.ie)\n".
				"			{\n".
				"				document.location.href = \"".api_get_path(WEB_PATH)."main/exercice/"."savescores.php?origin=$origin&learnpath_id=$learnpath_id&learnpath_item_id=$learnpath_item_id&time=".Security::remove_XSS($time)."&test=".$doc_url."&uid=".$_user['user_id']."&cid=".$cid."&score=\"+Score;\n".
				"				//window.alert(Score);\n".
				"			}\n".
				"			else\n".
				"			{\n".
				"				window.location.href = \"".api_get_path(WEB_PATH)."main/exercice/"."savescores.php?origin=$origin&learnpath_id=$learnpath_id&learnpath_item_id=$learnpath_item_id&time=".Security::remove_XSS($time)."&test=".$doc_url."&uid=".$_user['user_id']."&cid=".$cid."&score=\"+Score;\n".
				"			}\n".
				"		}\n".
				"}\n".
				"// Must be included \n".
				"function Finish(){\n".
				" mySaveScore();";

	$newcontent = str_replace($mit, $js_content, $content);
	$prehref = "<!-- BeginTopNavButtons -->";
	$posthref = "<!-- BeginTopNavButtons -->";
	$newcontent = str_replace($prehref, $posthref, $newcontent);


	if (CheckSubFolder($full_file_path.$_user['user_id'].'.t.html') == 0) {
		$newcontent = ReplaceImgTag($newcontent);
	}

} else {
	//my_delete($full_file_path.$_user['user_id'].'.t.html');
	$newcontent = $content;
}

WriteFileCont($full_file_path.$_user['user_id'].'.t.html', $newcontent);

/*	$prehref="javascript:void(0);";
	$posthref=$_configuration['root_web']."main/exercice/Hpdownload.php?doc_url=".$doc_url."&cid=".$cid."&uid=".$uid;
	$newcontent = str_replace($prehref,$posthref,$newcontent);

	$prehref="class=\"GridNum\" onclick=";
	$posthref="class=\"GridNum\" onMouseover=";
	$newcontent = str_replace($prehref,$posthref,$newcontent);
*/

$doc_url = GetFolderPath($doc_url).urlencode(basename($doc_url));
//	echo $document_web_path.$doc_url.$_user['user_id'].'.t.html';
//	exit;
?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo api_get_language_isocode(); ?>" lang="<?php echo api_get_language_isocode(); ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo api_get_system_encoding(); ?>">
<title><?php echo get_lang('Exercices').' - '.api_get_software_name(); ?></title>
</head>
<?php

if ($origin!='learnpath') {
	?>
	<frameset rows="178,*" border="0" frameborder="no">
		<frame name="top" scrolling="no" noresize target="contents" src="testheaderpage.php?file=<?php echo Security::remove_XSS(str_replace(array('../','\\','\\0','..'),array('','','',''),urldecode($_GET['file']))); ?>">
		<frame name="main" src="<?php echo $document_web_path.$doc_url.$_user['user_id'].'.t.html?time='.Security::remove_XSS($time); ?>">
	<noframes>
	<body>
		<p>This page uses frames, but your browser doesn't support them.
			We suggest you try Mozilla, Firebird, Safari, Opera, or other browsers updated this millenium.
 		</p>
	</body>
	</noframes>
	</frameset>
	<?php
} else {
	?>
	<script type='text/javascript'>
		s='<?php echo $document_web_path.$doc_url.$_user['user_id']; ?>.t.html?time=<?php echo Security::remove_XSS($time); ?>';
		//document.write(s);
		window.location=s;
	</script>
	<?php
}
?>

</html>
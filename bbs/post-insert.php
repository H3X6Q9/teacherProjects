<?php
include 'config.php';
include 'functions.php';

// 接收数据
$post = [
    'subject' => $_POST['subject'],
    'content' => $_POST['content'],
    'publish_at' => time(),
    'publish_by' => 'admin',
    'replies' => '0',
    'section_id' => $_POST['section_id'],
];
// 调试
//print_r($post);
//exit;

// 保存到数据库
$db = getDbLink();

$sql = "INSERT INTO `post` (`id`, `subject`, `content`, `publish_at`, `publish_by`, `replies`, `section_id`) VALUES (null, '".
    $post['subject']."', '".
    $post['content']."',".
    $post['publish_at'].",'".
    $post['publish_by']."',".
    $post['replies'].", ".
    $post['section_id'].")";

mysqli_query($db, $sql);

if(mysqli_errno($db) != 0){
    // 处理错误
    die(mysqli_error($db));
}

// 数据插入成功

// 跳转页面
header('Location: section.php?sid=' . $post['section_id'] );
exit;


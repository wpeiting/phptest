<?php
/**
 * PHP 代码缺陷检测系统 - 测试用例
 * 此文件包含多种常见的 PHP 代码缺陷，用于测试缺陷检测系统
 */

// ==================== 1. SQL 注入漏洞 ====================
function getUserById($id) {
    // 危险：直接拼接用户输入到 SQL 查询
    $query = "SELECT * FROM users WHERE id = " . $id;
    $result = mysql_query($query);
    return mysql_fetch_array($result);
}

function searchUsers($keyword) {
    // 危险：未使用预处理语句
    $query = "SELECT * FROM users WHERE name LIKE '%" . $_GET['keyword'] . "%'";
    return mysql_query($query);
}

// ==================== 2. XSS 跨站脚本漏洞 ====================
function displayUserInput() {
    // 危险：直接输出用户输入，未转义
    echo $_GET['name'];
    echo $_POST['comment'];
    print $_REQUEST['message'];
}

function showWelcome() {
    $username = $_GET['user'];
    // 危险：在 HTML 中直接输出
    echo "<h1>欢迎, " . $username . "</h1>";
}

// ==================== 3. 文件包含漏洞 ====================

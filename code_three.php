<?php
/**
 * 快速测试用例 - 包含最常见的缺陷
 * 适合快速测试系统功能
 */

// 1. SQL 注入漏洞（高危）
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = " . $id;
mysql_query($query);

// 2. XSS 跨站脚本（高危）
echo $_GET['name'];
echo "<h1>欢迎, " . $_POST['user'] . "</h1>";


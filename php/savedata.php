<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    echo "Request Method: POST<br>";
    $userData = array(
        "username" => $_POST["username"],
        "gender" => $_POST["gender"],
        "age" => $_POST["age"],
        "other" => $_POST["other"],
    );

    // 获取交易信息，存储为数组
    $transactionData = array(
        "amount" => $_POST["amount"],
        "date" => $_POST["date"],
        "No" => $_POST["No"],
        "degree" => $_POST["degree"],
        "Rdegree" => $_POST["Rdegree"],
    );

    // 读取现有的 JSON 数据
    $filename = "data.json";
    $existingData = file_exists($filename) ? json_decode(file_get_contents($filename), true) : array();

    // 如果用户信息已存在，将交易信息添加到用户信息中
    if (isset($existingData["userInformation"])) {
        $existingData["userInformation"]["transactions"][] = $transactionData;
    } else {
        // 如果用户信息不存在，创建一个新的用户信息数组
        $existingData["userInformation"] = $userData;
        $existingData["userInformation"]["transactions"][] = $transactionData;
    }

    // 转换为 JSON 格式
    $jsonData = json_encode($existingData, JSON_PRETTY_PRINT);

    // 将 JSON 数据写入文件
    file_put_contents($filename, $jsonData);

    echo "数据已成功保存到文件 'data.json'";
} else {
    echo "无效的请求方法";
}
?>

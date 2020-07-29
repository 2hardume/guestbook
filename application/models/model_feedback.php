<?php

class Model_Feedback extends Model
{

    public function getSortedData($from, $on_page, $sort)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->stmt_init();
        if ($sort == 'all') {
            $query = "SELECT name, rating, post FROM feedback ORDER BY rating DESC LIMIT ?, ?";
        } else {
            $query = "SELECT name, rating, post FROM feedback WHERE rating = ? LIMIT ?, ?";
        }
        if ($stmt->prepare($query)) {
            if ($sort == 'all') {
                $stmt->bind_param("ss", $from, $on_page);
            } else {
                $stmt->bind_param("iss", $sort, $from, $on_page);
            }
            $stmt->execute();
            $res = $stmt->get_result();
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
        }

        $conn->close();
        return $data;
    }

    function postAdd($tel, $name, $post, $time, $rating)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $success = false;
        $stmt = $conn->stmt_init();
        if ($stmt->prepare("INSERT INTO feedback (tel, name, rating, post, visitTime) VALUES (?, ?, ?, ?, CAST('$time' AS datetime))")) {
            $stmt->bind_param("ssss", $tel, $name, $rating, $post);
            $success = $stmt->execute();
            $stmt->close();
        }
        $conn->close();
        return $success;
    }

    function getCountStars()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT rating, COUNT(*) AS total FROM feedback GROUP BY rating";
        $row = $conn->query($query);
        $stars = mysqli_fetch_all($row, MYSQLI_ASSOC);
        for ($i = 0; $i <= 5; $i++) {
            $data[$i] = 0;
        }
        foreach($stars as $row) {
            $data[$row['rating']] = $row['total'];
        }
        return $data;
    }
}
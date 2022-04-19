<?php

echo 'hello said hasnaoui age 33';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        1

        function find_max(nums) {
            let max_num = Number.NEGATIVE_INFINITY; // smaller than all other numbers
            for (let num of nums) {
                if (num > max_num) {
                    max_num = num
                }
            }
            return max_num;
        }
        let x = find_max([3, 12, 3, 55, 77, 76, 78, 54, 34])
        console.log(x)
    </script>
</body>

</html>
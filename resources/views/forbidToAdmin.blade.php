<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2 class="text-center">你无权进入后台控制面板！</h2>
	<script language="javascript">
       setTimeout("location={{ URL('/') }}",3000);
</script>
</body>
</html>
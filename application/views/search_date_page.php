<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
<form action="<?=site_url('user/search_date')?>" method="post">

    <label for="searchDate">Enter the date</label>
    <input type="date" name="searchDate" value="<?=set_value('searchDate') ?>"/>

	<input type="submit" value="search" name="searchbtn"/>
</form>
</body>
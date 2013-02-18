<%@ page language="java" pageEncoding="GB2312"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    <title>Session ¹²Ïí</title>
    <style type="text/css">
		body {
			#background-color: #F00;
			background-color: #00F;
		}
	</style>
  </head>
  
  <body>
	<center>
    <%=request.getSession().getId()%>
	<h1>Tomcat(<%=request.getLocalAddr() %>)</h1>
  </body>
</html>

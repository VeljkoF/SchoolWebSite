<?xml version="1.0" encoding="UTF-8"?>
<titlenasrpskom:stylesheet version="1.0" xmlns:titlenasrpskom="http://www.w3.org/1999/XSL/Transform">
	<titlenasrpskom:template match="/">
		<html>
			<body>
				<!-- <h2>Novosti<h2> -->
				<table border="1">
					<tr bgcolor="#ccc ">
						<th>Nalov</th>
						<th>Link</th>
						<th>Opis</th>
					</tr>
					<titlenasrpskom:for-each select="rss/channel/item">
					<tr>
						<td><titlenasrpskom:value-of select="title"/></td>
						<td><titlenasrpskom:value-of select="link"/></td>
						<td><titlenasrpskom:value-of select="description"/></td>
					</tr>
					</titlenasrpskom:for-each>
				</table>
			</body>
		</html>
	</titlenasrpskom:template>
	
	
</titlenasrpskom:stylesheet>

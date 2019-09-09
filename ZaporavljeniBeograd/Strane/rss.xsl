<?xml version="1.0" encoding="UTF-8"?>
<veljko:stylesheet version="1.0" xmlns:veljko="http://www.w3.org/1999/XSL/Transform">


	<veljko:template match="/">
		<html>
			<body>
				<!-- <h2>Novosti<h2> -->
				<table border="1">
					<tr bgcolor="#ccc ">
						<th>Nalov</th>
						<th>Link</th>
						<th>Opis</th>
					</tr>
					<veljko:for-each select="rss/channel/item">
					<tr>
						<td><veljko:value-of select="title"/></td>
						<td><veljko:value-of select="link"/></td>
						<td><veljko:value-of select="description"/></td>
					</tr>
					</veljko:for-each>
				</table>
			</body>
		</html>
	</veljko:template>
	
	
</veljko:stylesheet>

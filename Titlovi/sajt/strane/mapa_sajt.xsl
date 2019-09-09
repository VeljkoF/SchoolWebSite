<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"  
xmlns:mapa="http://www.sitemaps.org/schemas/sitemap/0.9">
<xsl:template match="/">
<html>
<body>
<table border="1" width="600px" style="margin:20px auto;">
<tr bgcolor="gray">
<th>Redni broj</th>
<th>Adresa stranice</th>
<th>Učestalost promena</th>
<th>Prioritet</th>
</tr>
<xsl:for-each select="mapa:urlset/mapa:url">
<tr>
<td><xsl:value-of select="position()"/></td>
<td><xsl:value-of select="mapa:loc"/></td>
<td><xsl:value-of  select="mapa:changefreq"/></td>
<td><xsl:value-of select="mapa:priority"/></td>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet> 
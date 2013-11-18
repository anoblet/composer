<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version='1.0'>
    <xsl:output method="html"/>
	<xsl:template match="/">
	<ul>
		<xsl:for-each select="xml/Item/*">
		<li>
			<xsl:value-of select="local-name()"/>: <xsl:value-of select="."/>
		</li>
		</xsl:for-each>
	</ul>
	</xsl:template>
</xsl:stylesheet>
<?xml version="1.0"?>

<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<div class="Box">
			<div class="Titlebar">
				<div class="Title">
					<xsl:value-of select="title">
				</div>
				<div class="Minimize"></div>
				<div class="Close"></div>
			</div>
			<div class="Content">
				<xsl:value-of select="Content">
			</div>
		</div>
		<xsl:for-each select="catalog/cd">
			<tr>
				<td>
					<xsl:value-of select="title" />
				</td>
				<td>
					<xsl:value-of select="artist" />
				</td>
			</tr>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
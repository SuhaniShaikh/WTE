<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="text"/>  

    <xsl:template match="/">
        <xsl:text>Employee Records:</xsl:text>
        <xsl:text>&#10;&#10;</xsl:text> 
        <xsl:for-each select="employees/employee">
            <xsl:value-of select="id"/> <xsl:text> - </xsl:text>
            <xsl:value-of select="name"/> <xsl:text> - </xsl:text>
            <xsl:value-of select="position"/> <xsl:text> - </xsl:text>
            <xsl:value-of select="salary"/>
            <xsl:text>&#10;</xsl:text> 
        </xsl:for-each>
    </xsl:template>
</xsl:stylesheet>

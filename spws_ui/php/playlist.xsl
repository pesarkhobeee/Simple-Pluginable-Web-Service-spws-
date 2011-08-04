<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>playlist</h2>
  <ul>
    <xsl:for-each select="music/item">
    
      <li><xsl:value-of select="name" /></li>
    
    </xsl:for-each>
  </ul>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>

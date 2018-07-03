

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <!-- Create a XML document of such data and display it as a Web page
  filling out the total for each item and the Grand Total.
  You are also required to show

  a Summary Report right above the detailed sales report as shown above.
  The summary report should list the total number of items and the total
  quantity and the Grand Total. -->
  <!--  start of root template  -->


  <xsl:template match="/">
    <html>
      <body>
        <table border="1">
          <tr>
            <th colspan="6">Sales over $3M</th>
          </tr>
          <tr>
            <th>Type</th>
            <th>Title</th>
            <th>Picture</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sale</th>
          </tr>

          <xsl:apply-templates select="museum-sales/art[qty*price>3000000]"/>
        </table>
        <hr/>
        <table border="1">
          <tr>
            <th colspan="6">Art Sales with price between $600K and $1M</th>
          </tr>
          <tr>
            <th>Type</th>
            <th>Title</th>
            <th>Picture</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sale</th>
          </tr>

          <xsl:apply-templates select="museum-sales/art[price>=600000 and price <= 1000000]"/>
        </table>
        <hr/>
        <table border="1">
          <tr>
            <th colspan="6">All Sales</th>
          </tr>
          <tr>
            <th>Type</th>
            <th>Title</th>
            <th>Picture</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sale</th>
          </tr>

          <xsl:apply-templates select="museum-sales/art"/>
          <tr>
            <th align="right" colspan="5">Total Sales</th>
            <td>

              <xsl:call-template name="totalsales">
                <xsl:with-param name="list" select="museum-sales/art"/>
              </xsl:call-template>
            </td>
          </tr>
        </table>
      </body>
    </html>
  </xsl:template>
  <!--  end of root template  -->
  <!--  start of art template  -->

  <xsl:template match="art">
    <tr>
      <td>
        <xsl:value-of select="@type"/>
      </td>
      <td>
        <xsl:value-of select="title"/>
      </td>
      <td>
        <img src="{pic}" width="200px" height="200px"/>
      </td>
      <td>
        <xsl:value-of select="qty"/>
      </td>
      <td>
        <xsl:value-of select="format-number(price,'$##,000,000')"/>
      </td>
      <td>
        <xsl:value-of select="format-number(qty*price,'$##,000,000')"/>
      </td>
    </tr>
  </xsl:template>
  <!--  end of art template  -->
  <!-- start of totalsales template  -->

  <xsl:template name="totalsales">

    <xsl:param name="list"/>

    <xsl:param name="total" select="0"/>

    <xsl:choose>

      <xsl:when test="$list">
        <!--   calculate the first sale   -->

        <xsl:variable name="sale" select="$list[1]/qty * $list[1]/price"/>
        <!--  calling the template recursively  -->

        <xsl:call-template name="totalsales">

          <xsl:with-param name="list" select="$list[position() > 1]"/>

          <xsl:with-param name="total" select="$sale + $total"/>
        </xsl:call-template>
      </xsl:when>

      <xsl:otherwise>
        <xsl:value-of select="format-number($total, '$#,###')"/>
      </xsl:otherwise>
    </xsl:choose>
  </xsl:template>
  <!--  end of totalsales template  -->
</xsl:stylesheet>

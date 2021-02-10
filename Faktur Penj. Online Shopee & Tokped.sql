Declare @PeriodeAwal Varchar(10)='202001',@PeriodeAkhir Varchar(10)='203012'
Select 
  a.[BRANCH],a.[AREA],a.[INV NO],a.[INV DATE],a.[CUST CODE],a.[CUST NAME]
  ,a.[DPP],a.[NETTO],a.[SONO]
  ,a.[NOTE] 
  ,a.[SHIPMENT]
  ,a.[VAL INVOICE]
  ,a.[VAL PAYMENT]
  ,a.[SISA AR]
From
  (Select
    a.FC_BRANCH As [BRANCH],f.FV_AREANAME As [AREA],a.FC_INVNO As [INV NO],a.FD_INVDATE AS [INV DATE],a.FC_CUSTCODE AS [CUST CODE],c.FV_CUSTNAME AS [CUST NAME]
    ,a.FM_TTLDPP AS [DPP],a.FM_TTLNETTO AS [NETTO],b.FC_SONO AS [SONO]
    ,REPLACE(REPLACE(CONVERT(VARCHAR(MAX),b.FT_NOTE), CHAR(13), ''), CHAR(10), '') As [NOTE] 
    ,isnull(d.FV_NAME,'') AS [SHIPMENT]
    ,e.FM_VALUE AS [VAL INVOICE]
    ,ISNULL(e.FM_VALUEPAY,0) AS [VAL PAYMENT]
    ,e.FM_VALUE-ISNULL(e.FM_VALUEPAY,0) AS [SISA AR]
    ,CASE 
      WHEN a.FC_BRANCH='COGCKR' And a.FC_CUSTCODE IN('017378','017379','017198','016954') THEN 1
    END AS FLAGCUSTOMER
  From     
    d_transaksi..t_invmst a With (Nolock) Inner Join
      (
      Select DISTINCT
        b1.FC_BRANCH,b1.FC_SONO,a1.FC_SHIPTO,b1.FC_INVNO,convert(VARCHAR(100),a1.FT_NOTE) AS FT_NOTE
      From
        d_transaksi..t_somst a1 Left Join d_transaksi..t_sodtl b1
          On a1.FC_SONO=b1.FC_SONO And a1.FC_BRANCH=b1.FC_BRANCH
      Where
        RIGHT('0'+CAST(DATEPART(YEAR,a1.FD_SODATE)AS VARCHAR(4)),4)+RIGHT('0'+CAST(DATEPART(MONTH,a1.FD_SODATE)AS VARCHAR(2)),2)
        >=@PeriodeAwal
        And
        RIGHT('0'+CAST(DATEPART(YEAR,a1.FD_SODATE)AS VARCHAR(4)),4)+RIGHT('0'+CAST(DATEPART(MONTH,a1.FD_SODATE)AS VARCHAR(2)),2)
        <=@PeriodeAkhir
      ) As b
      On a.FC_INVNO=b.FC_INVNO And a.FC_BRANCH=b.FC_BRANCH
    Left Join d_master..t_customer c With (Nolock)
      On a.FC_CUSTCODE=c.FC_CUSTCODE And a.FC_BRANCH=c.FC_BRANCH
    Left Join d_master..t_custship d With (Nolock)
      On a.FC_CUSTCODE=d.FC_CUSTCODE And b.FC_SHIPTO=d.FC_SHIPCODE And a.FC_BRANCH=d.FC_BRANCH
    Inner Join d_transaksi..t_arblc1 e With (Nolock)
      On a.FC_INVNO=e.FC_DOCNO And a.FC_BRANCH=e.FC_BRANCH
    Left Join d_master..t_carea f With (Nolock)
      On c.FC_CUSTAREA=f.FC_AREA
  Where
    RIGHT('0'+CAST(DATEPART(YEAR,a.FD_INVDATE)AS VARCHAR(4)),4)+RIGHT('0'+CAST(DATEPART(MONTH,a.FD_INVDATE)AS VARCHAR(2)),2)
    >=@PeriodeAwal
    And
    RIGHT('0'+CAST(DATEPART(YEAR,a.FD_INVDATE)AS VARCHAR(4)),4)+RIGHT('0'+CAST(DATEPART(MONTH,a.FD_INVDATE)AS VARCHAR(2)),2)
    <=@PeriodeAkhir
  ) a
Where
  a.FLAGCUSTOMER=1 
Order By
  a.[INV NO]
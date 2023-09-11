----------------------------------------------------------------

Category ~

id (pk)
name [varchar]
slug (url) [varchar]
subcat_count(subcategory under category) [integer]
product_count(products under category) [integer]

----------------------------------------------------------------

Sub Category ~

id (pk)
name [varchar]
slug (url) [varchar]
product_count(products under subcat) [varchar]
category_id (fk)
category_name [varchar]

----------------------------------------------------------------

Products ~

id (pk)
name [varchar]
short_desc [varchar]
brief_desc [varchar]
price [float]
category_id (fk)
subcat_id (fk)
stock [integer]
product_image
slug (url) [varchar]
category_name [varchar]
subcat_name [varchar]

----------------------------------------------------------------

Orders ~

id (pk)
product_name [varchar]
product_id
order_cost [float]
status
quantity
created_at

----------------------------------------------------------------

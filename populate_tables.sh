#!/bin/sh
#export LD_LIBRARY_PATH=/usr/lib/oracle/12.1/client64/lib
sqlplus64 "h10tran/01013866@(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl)))"<<EOF

INSERT INTO drink VALUES (0, 'pint', 'Draft Pint', 8); 
INSERT INTO drink VALUES (1, 'domestic', 'Domestic bottle', 7); 
INSERT INTO drink VALUES (2, 'nonalc', 'Non-alcoholic', 6); 
INSERT INTO drink VALUES (3, 'liquor', 'Liquor', 10); 
INSERT INTO drink VALUES (4, 'hwine', 'House wine', 10); 
INSERT INTO drink VALUES (5, 'pwine', 'Premium wine', 12); 
INSERT INTO drink VALUES (6, 'malt10', 'Single malt (10 years)', 20); 
INSERT INTO drink VALUES (7, 'malt15', 'Single malt (15 years)', 25); 
INSERT INTO drink VALUES (8, 'juice', 'Juice', 6); 
INSERT INTO drink VALUES (9, 'pop', 'Pop', 4); 

INSERT INTO drinkTransaction VALUES (0, 8, 0);
INSERT INTO drinkTransaction VALUES (1, 7, 0);
INSERT INTO drinkTransaction VALUES (2, 6, 0);
INSERT INTO drinkTransaction VALUES (3, 10, 0);
INSERT INTO drinkTransaction VALUES (4, 10, 0);
INSERT INTO drinkTransaction VALUES (5, 12, 0);
INSERT INTO drinkTransaction VALUES (6, 20, 0);
INSERT INTO drinkTransaction VALUES (7, 25, 0);
INSERT INTO drinkTransaction VALUES (8, 6, 0);
INSERT INTO drinkTransaction VALUES (9, 4, 0);

exit;
EOF

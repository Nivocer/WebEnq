#java -cp .:./lib/bisiLibJasper.jar:./lib/bisiResources.jar:./lib/mysql-connector-java-5.1.6-bin.jar:./lib/poi-3.5-FINAL-20090928.jar:./lib/jasperreports-3.7.2.jar:./lib/iText-2.1.7.jar:./lib/commons-logging-1.1.1.jar:./lib/commons-digester-2.0.jar:./lib/commons-collections-3.2.1.jar:./lib/commons-beanutils-1.8.3.jar it.bisi.report.jasper.ExecuteReport /jaapandre_hva_rac jaapandre koffie 1
#java -cp .:./lib/bisiLibJasper.jar:./lib/bisiResources.jar:./lib/mysql-connector-java-5.1.6-bin.jar:./lib/poi-3.5-FINAL-20090928.jar:./lib/jasperreports-3.7.2.jar:./lib/iText-2.1.7.jar:./lib/commons-logging-1.1.1.jar:./lib/commons-digester-2.0.jar:./lib/commons-collections-3.2.1.jar:./lib/commons-beanutils-1.8.3.jar it.bisi.report.jasper.ExecuteReport /jaapandre_hva_rac jaapandre koffie 2
#java -cp .:./lib/bisiLibJasper.jar:./lib/bisiResources.jar:./lib/mysql-connector-java-5.1.6-bin.jar:./lib/poi-3.5-FINAL-20090928.jar:./lib/jasperreports-3.7.2.jar:./lib/iText-2.1.7.jar:./lib/commons-logging-1.1.1.jar:./lib/commons-digester-2.0.jar:./lib/commons-collections-3.2.1.jar:./lib/commons-beanutils-1.8.3.jar it.bisi.report.jasper.ExecuteReport /jaapandre_hva_rac jaapandre koffie $1 2>createReport.error
echo ------ >> createReport.error
echo $1 >> createReport.error
echo ------ >> createReport.error
path='/home/jaapandre/workspace/webenq4/public/reports'

#hva
dbuser='hva'
dbpassword=''

#webenq4
dbuser='webenq_org'
dbpassword=''

dir=$path/$2
echo $dir
#lokaal
java -cp .:./lib/* it.bisi.report.jasper.ExecuteReport 127.0.0.1/webenq_org_new_model $dbuser $dbpassword $1 $dir 2>>createReport.error
#server
#java -cp .:./lib/* it.bisi.report.jasper.ExecuteReport 127.0.0.1:6603/webenq_org_hva $dbuser $dbpassword $1 $dir 2>>createReport.error
#more createReport.error


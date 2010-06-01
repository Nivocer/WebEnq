package it.bisi.report.jasper;

import it.bisi.Utils;

import java.io.InputStream;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.Statement;

import java.util.HashMap;
import java.util.Map;

import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.view.JasperViewer;
import net.sf.jasperreports.engine.JasperExportManager;



public class ExecuteReport {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		runReport(args[0],args[1],args[2],args[3]);
	}
	
	public static Connection connectDB(String databaseName, String userName, String password) {
	      Connection jdbcConnection = null;
	      try{
	         Class.forName("com.mysql.jdbc.Driver");
	         String host="jdbc:mysql://"+databaseName;
	         //System.out.println("host="+host);
	         jdbcConnection = DriverManager.getConnection("jdbc:mysql://"+databaseName,userName,password);
	      }catch(Exception ex) {
	         String connectMsg = "Could not connect to the database: " + ex.getMessage() + " " + ex.getLocalizedMessage();
	         
	         ex.printStackTrace();
	      }
	      return jdbcConnection;
	   }
	
	public static void runReport(String databaseName, String userName, String password,String report_identifier) {
	      try{
	         Connection conn = connectDB(databaseName, userName, password);
	         InputStream inputStream = Utils.class.getResourceAsStream("/it/bisi/resources/report1.jasper");
	         Map prms = new HashMap();
	         //prms.put("IDENTIFIER", identifier);
	         //minus group...
	       //find out the group on rows and other report options
				Statement stmt_rows=conn.createStatement();
				stmt_rows.execute("select * from report_definitions where id='"+report_identifier+"'");

				ResultSet rs_repdef =stmt_rows.getResultSet();
				rs_repdef.next();
				String identifier=rs_repdef.getString("data_set_id");
				String group_rows=rs_repdef.getString("group_question_id");
				String output_file_name=rs_repdef.getString("output_filename");
				String output_format=rs_repdef.getString("output_format");
				String report_type=rs_repdef.getString("report_type");
								
				prms.put("GROUP_ROWS", group_rows);
//				prms.put("IDENTIFIER", identifier);
				prms.put("REPORT_IDENTIFIER", report_identifier);
				stmt_rows.close();
	         //
	         //returns result:
				//title 	srtdt 	enddt 	response 	percentage 	type 	group_id
				//MER jaar 2 - Vt blok 3 0910 	40276 	40306 	15 	0.1239669421487603 	AVG 	1
				//MER jaar 2 - Vt blok 3 0910 	40276 	40306 	15 	0.1239669421487603 	AVG 	3
				//MER jaar 2 - Vt blok 3 0910 	40276 	40306 	15 	0.1239669421487603 	AVG 	5
				// where group_id=theme_id
				// and type is type of crosstab needed.
	         String query="SELECT a.value title,b.value srtdt, " +
	         		"c.value enddt,d.value response,e.value percentage,type,group_id  " +
	         		"FROM info_"+identifier+" a,info_"+identifier+" b," +
	         				"info_"+identifier+" c, info_"+identifier+" d," +
	         				"info_"+identifier+" e," +
	         				"(SELECT distinct q.group_id,case when instr(type,'Closed_Percentage')=0 then " +
	         				"case when instr(type,'Closed_Scale')=0 then 'N' else 'AVG' end " +
	         				"else 'PERC' end type FROM questions_"+identifier+" q,meta_"+identifier+" m " +
	         				"where m.question_id=q.id and parent_id=0 and q.id!='"+group_rows+"' and " +
	         				"(type like '%Closed_Percentage%' or type like '%Closed_Scale%')) t "+
	         		"where a.id='Titel vragenlijst' " +
	         		"and b.id='Startdatum' " +
	         		"and c.id='Einddatum' " +
	         		"and d.id='unieke respondenten' " +
	         		"and e.id='Respons percentage' ";
	         
	         prms.put("QUERY", query);
	         JasperPrint print = JasperFillManager.fillReport(inputStream, prms, conn);

	         // if output format is pdf: create the pdf (current dir for now), else lanch the viewer, so you can save it in other formats
	         if("pdf".equals(output_format)){
	        	 JasperExportManager.exportReportToPdfFile(print, output_file_name+"."+output_format);
	         }else{
	        	JasperViewer.viewReport(print);
	         }
	      }catch(Exception ex) {
	         String connectMsg = "Could not create the report " + ex.getMessage() + " " + ex.getLocalizedMessage();
	         
	         ex.printStackTrace();
	      }
	   }

}

/**
 * 
 */
package it.bisi.report;


import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.URL;


/**
 * @author jaapandre
 *
 */
public class GetData {

	/**
	 * @param maxAge age in seconds
	 * @return 
	 * 
	 */
	
	public static String getData(String urlString, String outputDir, Long maxAge) {
		// TODO Auto-generated method stub
		//Determine fileName (remove '/' in name)
		String fileName=createFileNameFromUrl(urlString);
		// is file available and is it not too old
		if (outputDir==null){
			outputDir="tempout";
		}
		//does file exist and isn't it too old:
		File file=new File(outputDir+"/"+fileName);
		if (!file.canRead() || (System.currentTimeMillis()-file.lastModified()>(maxAge*1000))) {
			// create the connection and request to the server
		try {
			URL url = new URL(urlString);
			InputStream in = url.openStream();
			OutputStream out = new FileOutputStream(new File(outputDir+"/"+fileName));
			
			int read = 0;
			byte[] bytes = new byte[1024];
		 
			while ((read = in.read(bytes)) != -1) {
				out.write(bytes, 0, read);
			}
		 	in.close();
			out.flush();
			out.close();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		return fileName; 
	}
	
	/**
	 * create file name from url, replace '://, and '/' to _
	 * so http://webenq4.localhost/questionnaire/xform-data/id/1
	 * becomes http_webenq4.localhost_questionnaire_xform-data_id_1
	 * 
	 * @param url
	 * @return file name (no extension)
	 */
	public static String createFileNameFromUrl(String url){
		return url.replace("://","_").replace("/","_");
	}

}

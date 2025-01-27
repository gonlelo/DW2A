package Ficheros;

import java.io.FileReader;
import java.io.IOException;

public class LeerArchivoCharChar {


	    public static void main(String[] args) {
	        try (FileReader fr = new FileReader("src/Ficheros/fichero.txt")) {
	            int c;
	            while ((c = fr.read()) != -1) { // Lee carácter por carácter
	            	if ((char)c != 'g') {
	                System.out.print((char) c);
	            	}
	            }
	        } catch (IOException e) {
	            e.printStackTrace();
	        }
	    }
	}
package Ficheros;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;

public class EscribirArchivoLineaLinea {
    public static void main(String[] args) {
        String ruta = "src/Ficheros/fichero.txt"; // Ruta del fichero
        try (BufferedWriter bw = new BufferedWriter(new FileWriter(ruta))) {
            bw.write("Primera línea de texto");
            bw.newLine(); // Salto de línea
            bw.write("Segunda línea de texto");
            bw.newLine();
        } catch (IOException e) {
            System.err.println("Error al escribir en el fichero: " + e.getMessage());
        }
    }
}


/*   try (FileWriter fw = new FileWriter("archivo.txt")) {
     fw.write("Línea 1\n");
     fw.write("Línea 2\n");
     }  ESTE MÉTODO ES MÄS FACIL YA QUE NO USA BUFFEREDWRITER QUE NO HACE FALTA*/
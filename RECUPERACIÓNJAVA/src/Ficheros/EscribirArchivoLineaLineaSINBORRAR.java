package Ficheros;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;

public class EscribirArchivoLineaLineaSINBORRAR {
    public static void main(String[] args) {
        String ruta = "src/Ficheros/fichero.txt"; // Ruta del fichero
        try (BufferedWriter bw = new BufferedWriter(new FileWriter(ruta, true))) { // 'true' para append
            bw.write("Primera línea de texto");
            bw.newLine();
            bw.write("Segunda línea de texto");
            bw.newLine();
        } catch (IOException e) {
            System.err.println("Error al escribir en el fichero: " + e.getMessage());
        }
    }
}
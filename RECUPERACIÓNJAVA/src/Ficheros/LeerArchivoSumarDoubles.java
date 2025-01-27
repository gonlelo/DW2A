package Ficheros;

import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;
import java.util.Locale;

public class LeerArchivoSumarDoubles {
    public static void main(String[] args) throws IOException {

        Scanner s = null;
        double sum = 0;

        try {
            s = new Scanner(new FileReader("src/Ficheros/fichero.txt"));
            s.useLocale(Locale.US);     //Indica que idioma usar mas o menos, en este caso coge la puntuacion de numeros de EEUU.

            while (s.hasNext()) {
                if (s.hasNextDouble()) {
                    sum += s.nextDouble();
                } else {
                    s.next();
                }
            }
        } finally {
            if (s != null) {
                s.close();
            }
        }

        System.out.println(sum);
    }
}
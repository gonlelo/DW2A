package Geometría;

public class Rectángulo {
    public int width = 0;
    public int height = 0;
    public Punto origin;

    // four constructors
    public Rectángulo() {
	origin = new Punto(0, 0);
    }
    public Rectángulo(Punto p) {
	origin = p;
    }
    public Rectángulo(int w, int h) {
	origin = new Punto(0, 0);
	width = w;
	height = h;
    }
    public Rectángulo(Punto p, int w, int h) {
	origin = p;
	width = w;
	height = h;
    }

    // a method for moving the rectangle
    public void move(int x, int y) {
	origin.x = x;
	origin.y = y;
    }

    // a method for computing the area of the rectangle
    public int getArea() {
	return width * height;
    }
}
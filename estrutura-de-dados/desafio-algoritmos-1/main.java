import java.nio.file.*;
import java.util.List;
import java.io.IOException;
import java.io.BufferedWriter;
import java.io.FileWriter;

public class Main {
  public static void sort(int arr[], int size) {
    int swap = -1;
    while (swap != 0) {
      swap = 0;

      for (int i = 0; i < size - 1; i++) {
        if (arr[i] < arr[i + 1]) {
          int tmp = arr[i];
          arr[i] = arr[i + 1];
          arr[i + 1] = tmp;
          swap++;
        }
      }
    }
  }
  
  public static void writeResult(String result, String fileName) {
    try {
        BufferedWriter writer = new BufferedWriter(new FileWriter(fileName));

        // Write result
        writer.write(result);
        writer.newLine();

        // Close file
        writer.close();

        System.out.println("Generated output file");
    } catch (IOException e) {
        System.err.println("Error creating file: " + e.getMessage());
    }
  }
  
  public static void main(String[] args) {
    Path file = Paths.get("src/main/java/input.txt");

    try {
      if (Files.exists(file)) {
        List<String> lines = Files.readAllLines(file);
        int qttPlayers = Integer.parseInt(lines.get(0));
        int min = Integer.parseInt(lines.get(1));
        int ponctuations[] = new int[qttPlayers];
        int classified = 0;

        for (int i = 2, j = 0; i < lines.size(); i++, j++) {
          ponctuations[j] = Integer.parseInt(lines.get(i));
        }

        // Sort array (bubble sort)
        sort(ponctuations, qttPlayers);
        

        // Calculate classified players
        for (int i = 0; i < qttPlayers; i++) {
          if (classified < min) {
            classified++;
          } else if (ponctuations[i] == ponctuations[min - 1]) {
            classified++;
          }
        }

        // Write output file
        writeResult(Integer.toString(classified), "src/main/java/output.txt");
        
      } else {
        System.out.println("File doesn't exist");
      }
    } catch (IOException e) {
      System.out.println("Error accessing the file: " + e.getMessage());
      e.printStackTrace();
    }
  }
}
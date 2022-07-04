import { View, Text, StyleSheet } from 'react-native'
import React from 'react'

const AboutScreen = () => {
  return (
    <View style={styles.container}>
      <Text>About us</Text>
      <View>
        <Text>Dit is een summa college app voor leerlingen die meer moeten bewegenen.
          dit is door studenten gemaakt om andere studenten te helpen met sporten.
          je zal oefeningen doen en de presentatie daar van kunnen zien.
          voor meer vragen kun je contact opnemen met een van deze leerlingen
          Omar Ahmed, Maikel Bergman en Gregory.
        </Text>
        <View>
          <Text>App Version: 2.0.1</Text>
        </View>
      </View>
    </View>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
    alignItems: "center",
    marginTop: 80,
    padding: 20

  },
});

export default AboutScreen
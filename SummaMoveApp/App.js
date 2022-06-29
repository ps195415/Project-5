import { NavigationContainer } from '@react-navigation/native';
import { createMaterialBottomTabNavigator } from '@react-navigation/material-bottom-tabs';
import { createStackNavigator } from '@react-navigation/stack';
import AboutScreen from './components/AboutScreen';
import SettingsScreen from './components/SettingsScreen';
import OefeningenScreen from './components/OefeningenScreen';
import PrestatieScreen from './components/PrestatieScreen';
import LoginScreen from './components/LoginScreen';

const Tab = createMaterialBottomTabNavigator();
const Stack = createStackNavigator();

const AppStack = () => {
  return (
    //<Stack.Screen name="Login" component={LoginScreen} />
    <Stack.Navigator screenOptions={{
      headerShown: false
    }}>

      <Stack.Screen name="Home" component={AppTabs} />
    </Stack.Navigator>
  );
}


const AppTabs = () => {
  return (
    <Tab.Navigator>
      <Tab.Screen name="Prestaties" component={PrestatieScreen} />
      <Tab.Screen name="Oefeningen" component={OefeningenScreen} />
      <Tab.Screen name="Over ons" component={AboutScreen} />
      <Tab.Screen name="Instellingen" component={SettingsScreen} />
    </Tab.Navigator>
  );
}

const App = () => {
  return (
    <NavigationContainer>
      <AppStack />
    </NavigationContainer>
  ); 
}
export default App;
